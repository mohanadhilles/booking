<?php

namespace Classiebit\Eventmie\Models;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded = [];
    
    public function get_countries()
    {   
        $result = Country::all();
        return to_array($result);
    }

    // get event country
    public function get_event_country($id = null)
    {   
       $result = Country::where(['id' => $id])->first();

        return collect($result);
    }
}
