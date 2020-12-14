<?php

/**
 * Eventmie asset helpers
 * 
 * Make a direct access link to eventmie asset route 
 * 
*/
if (!function_exists('eventmie_asset')) 
{
    function eventmie_asset($path, $secure = null)
    {
        return route('eventmie.eventmie_assets').'?path='.urlencode($path);
    }
}

/**
 * Eventmie URL
 * 
 * prefix eventmie url
 * 
*/
if (!function_exists('eventmie_url')) 
{
    function eventmie_url($url = '')
    {
        return url(config('eventmie.route.prefix').'/'.$url);
    }
}




/**
 * Notifications
 * 
 * show notifications
 * 
*/
if (!function_exists('notifications')) 
{
    /**
     * Notificaion for all views 
     */
    
    function notifications()
    {
        $user_id        = \Auth::id();
        $user           = \Classiebit\Eventmie\Models\User::find($user_id);
        $mode           = config('database.connections.mysql.strict');

        $table    = 'notifications'; 
        $query          = DB::table($table);
        

        if(!$mode)
        {
            // safe mode is off
            $select = array(
                            "$table.notifiable_id",
                            "$table.id",
                            DB::raw("COUNT($table.n_type) as total"),
                            "$table.n_type",
                            "$table.data",
                            "$table.read_at",
                            "$table.updated_at",
                        );
        }
        else
        {
            // safe mode is on
            $select = array(
                            DB::raw("ANY_VALUE($table.notifiable_id) as notifiable_id"),
                            DB::raw("ANY_VALUE($table.id) as id"),
                            DB::raw("COUNT($table.n_type) as total"),
                            "$table.n_type",
                            DB::raw("ANY_VALUE($table.data) as data"),
                            DB::raw("ANY_VALUE($table.read_at) as read_at"),
                            DB::raw("ANY_VALUE($table.updated_at) as updated_at"),
                        );
        }
        
        $notifications  =   $query->select($select)
                            ->where("$table.notifiable_id",  $user_id )
                            ->where(["$table.read_at" =>  null])
                            ->where("$table.n_type", '!=',  null)
                            ->groupBy("$table.n_type")
                            ->get();

        $notifications  = to_array($notifications);
                            
        return  ['notifications' => $notifications, 'total_notify' => $user->unreadNotifications->count()];                    
    } 
}
    

/**
 * Detect RTL
 * 
 * detect RTL language according to languages
 * defined in the evenmie config
 * 
*/
if (!function_exists('is_rtl')) 
{
    /**
     * return boolean
     */
    function is_rtl()
    {
        $rtl_langs = config('eventmie.rtl_langs');

        $current_lang = App::getLocale();
        if (in_array($current_lang, $rtl_langs)) 
            return true;

        return false;
    } 
}

/**
 *  get all language folder name from resource/lang/vendor/eventmie 
 */
if (!function_exists('lang_selector')) 
{
    /**
     * return boolean
     */
    function lang_selector()
    {
        // detect package development mode
        // if in package development mode - lang_path will be package else vendor
        $lang_path = resource_path('lang'.DIRECTORY_SEPARATOR.'vendor'.DIRECTORY_SEPARATOR.'eventmie-pro');
        if(config('voyager.pkg_dev_mode') || config('voyager.demo_mode'))
            $lang_path = dirname(__DIR__).'/../publishable/lang/eventmie-pro';
        
        // fetch langs from folder
        $directories = File::directories($lang_path);
        $directories = array_map('basename', $directories);

        return $directories;
    } 
}


/**
 *  eloquent data to array
 */
if (!function_exists('to_array')) 
{
    /**
     * return array
     */
    function to_array($data)
    {
        if(empty($data))
            return [];

        return $data->toArray();
    }
}


    
/**
 *  checkMailCreds
 */
if (!function_exists('checkMailCreds')) 
{
    /**
     * don't send in demo mode
     *
     * @return boolean
     */
    function checkMailCreds()
    {
        // don't send in demo mode
        if (config('voyager.demo_mode')) 
            return false;

        return true;
    }

}

