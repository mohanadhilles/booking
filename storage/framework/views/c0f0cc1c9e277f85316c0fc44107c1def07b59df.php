<?php $__env->startSection('page_header'); ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-6 mb-0">
                <h1 class="page-title">
                    <i class="voyager-boat"></i> <?php echo e(__('voyager::generic.Dashboard')); ?>

                </h1>
            </div>
            <div class="col-xs-6 mb-0">
                <div class="dropdown pull-right custom-dashboard-dropdown">
                    <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                        <?php echo e(__('voyager::generic.Notifications')); ?>

                        <span class="caret"></span>
                    </button>
                    <ul class="dropdown-menu dropdown-menu-center" aria-labelledby="dropdownMenu1">
                        <?php $__currentLoopData = $total_notifications; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $notification): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
                        <li>
                            <a href="<?php echo e(route('eventmie.notify_read', ['n_type' => $notification->n_type])); ?>"> 
                                <?php echo e($notification->total); ?> <?php echo e(__('voyager::generic.new')); ?> 
                                <?php echo e($notification->n_type); ?>

                            </a>
                        </li>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <li role="separator" class="divider"></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('content'); ?>
<div class="page-content browse container-fluid custom-dashboard">
    <?php echo $__env->make('voyager::alerts', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <div class="row">
        <div class="col-md-12">
            
            
            <div class="row statistics">

                <div class="col-md-2">
                    <div class="box">
                        <i class="voyager-people text-center"></i>
                        <div class="info">
                            <h3><?php echo e($total_customers); ?></h3> <p><?php echo e(__('voyager::generic.Customers')); ?> </p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="box">
                        <i class="voyager-company text-center"></i>
                        <div class="info">
                            <h3><?php echo e($total_organizers); ?></h3> <p><?php echo e(__('voyager::generic.Organisers')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="box">
                        <i class="voyager-calendar text-center"></i>
                        <div class="info">
                            <h3><?php echo e($total_events); ?></h3> <p><?php echo e(__('voyager::generic.Events')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-2">
                    <div class="box">
                        <i class="voyager-ticket text-center"></i>
                        <div class="info">
                            <h3><?php echo e($total_bookings); ?></h3> <p><?php echo e(__('voyager::generic.Bookings')); ?></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="box">
                        <i class="voyager-dollar text-center"></i>
                        <div class="info">
                            <h3><?php echo e($total_revenue.' '.setting('regional.currency_default')); ?></h3> <p><?php echo e(__('voyager::generic.Revenue')); ?></p>
                        </div>
                    </div>
                </div>

            </div>

                

            <div class="panel panel-bordered">
                <div class="panel-body">
                        
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h3><?php echo e(__('voyager::generic.Top 10 Selling Events')); ?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <?php echo $eventsChart->container(); ?>

                        </div>
                    </div>
                    
                </div>
            </div>

            <div class="panel panel-bordered">
                <div class="panel-body">
                    
                    <div class="row">
                        <div class="col-md-12">
                            <h3><?php echo e(__('voyager::generic.Event Sales Reports')); ?></h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <form >
                                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                                <div class="form-group">
                                    <select class="form-control" name="event_id" id="event_id">
                                        <option><?php echo e(__('voyager::generic.all')); ?> <?php echo e(__('voyager::generic.Events')); ?></option>
                                        <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($value['id']); ?>"> <?php echo e($value['title']); ?> </option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row" >
                        <div class="col-md-12 table-responsive">
                            <table class="table table-striped table-hover table-condensed" id="sales_report">
                                <thead>
                                    <tr>
                                        <th><?php echo e(__('voyager::generic.Event')); ?></th>
                                        <th><?php echo e(__('voyager::generic.Timing')); ?></th>
                                        <th><?php echo e(__('voyager::generic.Customer')); ?></th>
                                        <th><?php echo e(__('voyager::generic.Booking')); ?> <?php echo e(__('voyager::generic.Date')); ?></th>
                                        <th><?php echo e(__('voyager::generic.Checked In')); ?></th>
                                        <th><?php echo e(__('voyager::generic.Ticket')); ?></th>
                                        <th><?php echo e(__('voyager::generic.Order')); ?> <?php echo e(__('voyager::generic.total')); ?></th>
                                        <th><?php echo e(__('voyager::generic.Organiser')); ?></th>
                                        <th><?php echo e(__('voyager::generic.Organiser Earning')); ?></th>
                                        <th><?php echo e(__('voyager::generic.Admin Commission')); ?></th>
                                        <th><?php echo e(__('voyager::generic.Admin Tax')); ?></th>
                                        <th><?php echo e(__('voyager::generic.Payout')); ?></th>
                                    </tr>      
                                </thead>		
                                
                                <tfoot class="custom-table-foot" id="tfoot">
                                    <tr>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </tfoot>
                                
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('javascript'); ?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <?php echo $eventsChart->script(); ?>


    <script>
        var url            = <?php echo json_encode(route('voyager.sales_report')); ?>

        var token          = <?php echo json_encode(csrf_token()); ?>

        
       
        function sales_report() {
            $('#sales_report').DataTable({
                processing : true,
                serverSide : true,
                searching: false,
                lengthMenu: [ 
                    [10, 25, 50, -1], 
                    [10, 25, 50, "All"] 
                ],                
                
                ajax: {
                    url  : <?php echo json_encode(route('voyager.sales_report')); ?>,
                    type :'POST',
                    data : { 
                        _token   : <?php echo json_encode(csrf_token()); ?>,
                        event_id : document.getElementById("event_id").value
                
                    },
                },
 
                columns: [
                    
                    { data: 'event_title',   name: 'event_title' ,render:function(data, type, row){
                        return '<small class="text-bold">'+row.event_title+'</small>';
                    }},
                    { data: 'event_start_date',   name: 'event_start_date' ,render:function(data, type, row){
                        return row.event_start_date +' - <p>'+ row.event_end_date+'</p>';
                    }},
                    { data: 'customer_name',   name: 'customer_name' ,render:function(data, type, row){
                        return row.customer_name +' <p>('+ row.customer_email+')</p>';
                    }},
                    { data: 'created_at',         name: 'created_at' },
                    { data: 'checked_in',         name: 'checked_in' , render:function(data, type, row){
                        return row.checked_in > 0 ? "<?php echo app('translator')->get('eventmie-pro::em.yes'); ?>"+" ("+row.checked_in+"/"+row.quantity+")" : "<?php echo app('translator')->get('eventmie-pro::em.no'); ?>"
                    } },
                    { data: 'ticket_price',       name: 'ticket_price', render:function(data, type, row){
                        return row.ticket_price +' '+ row.currency+'<p>('+row.ticket_title+'<strong class="text-bold"> X '+row.quantity+'</strong>'+')</p>';
                    }},
                    { data: 'price',              name: 'price', render:function(data, type, row){
                        return row.price +' '+ row.currency 
                    }},
                    { data: 'name',         name: 'name' , render:function(data, type, row){
                        return row.name +' <p>('+ row.email+')</p>';
                    } },
                    { data: 'organiser_earning',         name: 'organiser_earning' , render:function(data, type, row){
                        return row.organiser_earning ? row.organiser_earning : 0+' '+row.currency;
                    } },
                    { data: 'admin_commission',         name: 'admin_commission' , render:function(data, type, row){
                        return row.admin_commission ? row.admin_commission : 0+' '+row.currency;
                    } },
                    { data: 'admin_tax',         name: 'admin_tax' , render:function(data, type, row){
                        return row.admin_tax ? row.admin_tax : 0+' '+row.currency;
                    } },
                    { data: 'transferred',        name: 'transferred' , render:function(data, type, row){
                        return (row.transferred <= 0 && row.organiser_earning > 0) ? "<?php echo app('translator')->get('eventmie-pro::em.pending'); ?>" : "<?php echo app('translator')->get('eventmie-pro::em.transferred'); ?>"; 
                    }},
                ],

                footerCallback : function ( row, data, start, end, display ) {
                    var currency = data.length > 0 ? data[0].currency : '' ;
                    var api = this.api(), data;
                    // converting to interger to find total
                    var intVal = function ( i ) {
                        return typeof i === 'string' ?
                            i.replace(/[\$,]/g, '')*1 :
                            typeof i === 'number' ?
                                i : 0;
                    };
        
                    // computing column Total of the complete result 
                    var total_ticket_price = api
                        .column( 5 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        
                    // Update footer by showing the total with the reference of the column index 
                    var msg = "<?php echo app('translator')->get('eventmie-pro::em.total'); ?>";
                    $( api.column( 0 ).footer() ).html(msg);
                    $( api.column( 5 ).footer() ).html(total_ticket_price.toFixed(2)+' '+ currency);

                    
                    // computing column Total of the complete result 
                    var customer_paid = api
                        .column( 6 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        
                    // Update footer by showing the total with the reference of the column index 
                    $( api.column( 6 ).footer() ).html(customer_paid.toFixed(2)+' '+ currency);    
                      
                      // computing column Total of the complete result 
                    var organiser_earning = api
                        .column( 8 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        
                    // Update footer by showing the total with the reference of the column index 
                    $( api.column( 8 ).footer() ).html(organiser_earning.toFixed(2)+' '+ currency);    


                    // computing column Total of the complete result 
                    var admin_commission = api
                        .column( 9 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        
                    // Update footer by showing the total with the reference of the column index 
                    $( api.column( 9 ).footer() ).html(admin_commission.toFixed(2)+' '+ currency);    
                      
                    // computing column Total of the complete result 
                    var admin_tax = api
                        .column( 10 )
                        .data()
                        .reduce( function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0 );
                        
                    // Update footer by showing the total with the reference of the column index 
                    $( api.column( 10 ).footer() ).html(admin_tax.toFixed(2)+' '+ currency);    
                      
                },

                drawCallback: function( settings ) {
                    window.sales_report_data =  settings.json.data;
                }
            });

        }    

        //search event
        $('#event_id').change(function(){
            $('#sales_report').DataTable().destroy();
            sales_report();        
        });

        // call fucntion
        sales_report();   
    </script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('voyager::master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /Users/mohanad/Documents/waleed/booking/eventmie-pro/src/../resources/views/vendor/voyager/dashboard.blade.php ENDPATH**/ ?>