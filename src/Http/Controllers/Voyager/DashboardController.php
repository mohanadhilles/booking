<?php

namespace Classiebit\Eventmie\Http\Controllers\Voyager;
use Facades\Classiebit\Eventmie\Eventmie;


use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Classiebit\Eventmie\Models\Event;
use Classiebit\Eventmie\Models\User;
use Classiebit\Eventmie\Models\Booking;

use Classiebit\Eventmie\Charts\EventChart;
use Classiebit\Eventmie\Models\Notification;
use Yajra\Datatables\Datatables;

class DashboardController extends VoyagerBaseController
{
    public function __construct()
    {
        $this->middleware(['admin.user']);

        $this->event         = new Event; 
        $this->booking       = new Booking;
        $this->notification  = new Notification;
        $this->user          = new User;
    }

    /**
     *  index page
     */
    public function index(Request $request)
    {
        $total_organizers         = $this->user->total_organizers();
        $total_customers          = $this->user->total_customers();
        $total_events             = $this->event->total_event();
        $total_bookings           = $this->booking->total_bookings();
        $total_revenue            = $this->booking->total_revenue();
        $total_notifications      = $this->notification->total_notifications();
        $events                   = $this->event->get_all_events();
        
        $top_selling_events       = $this->event->top_selling_events();
        $labels = [];
        $values = [];
        if(!empty($top_selling_events))
        {
            foreach($top_selling_events as $val)
            {
                $labels[] = strlen($val['title']) > 25 ? mb_substr($val['title'], 0, 25, 'utf-8')."..." : $val['title'];
                $values[] = $val['total_bookings'];
            }
        }
        $eventsChart = new EventChart;
        $eventsChart
        ->labels($labels)
        ->dataset(__('voyager::generic.total').' '.__('voyager::generic.Bookings'), 'bar', $values)
        ->color("rgba(27, 137, 239, 1)")
        ->backgroundcolor("rgba(26, 136, 239, 0.7)");
        
        return Eventmie::view('eventmie::vendor.voyager.dashboard', compact(
            'eventsChart', 'total_customers', 'total_organizers', 'total_bookings', 
            'total_revenue', 'total_notifications', 'total_events', 'events'));
    }

    /**
     * sales report
     */

    public function sales_report(Request $request)
    {
        
        $event_id    = (int) $request->event_id;

        $full_query  = null;

        $query       = Booking::query();

        $full_query  = $query->select([
                                'bookings.*', 
                                
                                'users.name', 
                                'users.email',
                                
                                'commissions.organiser_earning',
                                'commissions.transferred', 
                                'commissions.admin_commission', 
                                'commissions.admin_tax', 

                                'events.slug as event_slug',
                            ])
                        ->from('bookings')->join('events', 'events.id', '=', 'bookings.event_id')
                        ->join('users', 'users.id', '=', 'bookings.organiser_id')
                        ->leftjoin('commissions', 'commissions.booking_id', '=', 'bookings.id')
                        ->orderBy('bookings.created_at', 'DESC');
        
        // searching event by event id
        if($event_id > 0)
        {
            $full_query = $query->where('bookings.event_id', $event_id);
        }
        
        return Datatables::of($full_query)->make(true);
        
    }

    
    
}    