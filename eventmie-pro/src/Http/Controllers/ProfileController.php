<?php

namespace Classiebit\Eventmie\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Classiebit\Eventmie\Models\User;
use Facades\Classiebit\Eventmie\Eventmie;

class ProfileController extends Controller
{
    
    public function __construct()
    {
        // language change
        $this->middleware('common');
    
        $this->middleware('auth');
    }

    public function index($view = 'eventmie::profile.profile', $extra = [])
    {
        $cities = $this->get_cities();
        $user  = $this->getAuthUser();
        return Eventmie::view($view, compact('user', 'extra','cities'));
    }
    
    // get login user
    public function getAuthUser ()
    {
        return Auth::user();
    }

    // update user
    public function updateAuthUser (Request $request)
    {
        // demo mode restrictions
        if(config('voyager.demo_mode'))
        {
            return error_redirect('Demo mode');
        }
        
        $this->validate($request, [
            'name' => 'required|string',
            'gender' => 'required',
            'age' => 'required',

            'linkedin' => 'required',
            'company' => 'required|string',
            'answer_1' => 'required',
            'answer_2' => 'required',
            'preferred' => 'required',
            'email' => 'required|email|unique:users,email,'.Auth::id()
        ]);
        
        if(!empty($request->current))
        {
            $data = $this->updateAuthUserPassword($request);
        
            if($data['status'] == false)
            {
                return error_redirect($data['errors']);
            }
        }
        
        $user = User::find(Auth::id());

        $user->name                  = $request->name;
        $user->email                 = $request->email;
        $user->address               = $request->address;
        $user->gender                = $request->gender;
        $user->age                   = $request->age;
        $user->linkedin              = $request->linkedin;
        $user->company               = $request->company;
        $user->answer_1              = $request->answer_1;
        $user->answer_2              = $request->answer_2;
        $user->preferred             = $request->preferred;
        $user->cities                = $request->cities;
        $user->phone                 = $request->phone;
        $this->updatebankDetails($request, $user);
        $user->save();

        // redirect no matter what so that it never turns back
        $msg = __('eventmie-pro::em.saved').' '.__('eventmie-pro::em.successfully');
        return success_redirect($msg, route('eventmie.profile'));
        
    }

    // reset password
    public function updateAuthUserPassword(Request $request)
    {
        // demo mode restrictions
        if(config('voyager.demo_mode'))
        {
            return error_redirect('Demo mode');
        }
        $this->validate($request, [
            'current' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $user = User::find(Auth::id());

        if (!Hash::check($request->current, $user->password)) {
            return ['errors' => __('eventmie-pro::em.current_password_not_match') , 'status' => false];
        }

        
        $user->password = Hash::make($request->password);
        $user->save();

        return ['status' => true];
    }

    // update user role
    public function updateAuthUserRole(Request $request)
    {
        $this->validate($request, [
            'role_id'       => 'required',
            'organisation'  => 'required',
        ]);
        
        $user = User::find(Auth::id());

        $user->role_id      = $request->role_id;
        $user->organisation = $request->organisation;

        $user->save();

        return redirect()->route('eventmie.profile');
    }

    // bank details update only for admin and orgainser
    public function updateBankDetails(Request $request, $user = [])
    {   
        $user->bank_name             = $request->bank_name;
        $user->bank_code             = $request->bank_code;
        $user->bank_branch_name      = $request->bank_branch_name;
        $user->bank_branch_code      = $request->bank_branch_code;
        $user->bank_account_name     = $request->bank_account_name;
        $user->bank_account_number   = $request->bank_account_number;
        $user->bank_account_phone    = $request->bank_account_phone;
    }

    function get_cities()
        {
            return [
                'riyadh'  => 'الرياض',
                'jadda'   => 'جدة',
                'damam' =>  'الدمام',
                'alkharj ' => 'الخرج',
                '0' => 'آخرى',
        ];
        }
}