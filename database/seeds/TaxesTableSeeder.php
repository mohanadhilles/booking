<?php

use Illuminate\Database\Seeder;
use Classiebit\Eventmie\Models\Tax;

class TaxesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
    
        $tax = $this->tax('id', 1);
        if (!$tax->exists) 
        {
            \DB::table('taxes')->insert(array (
                0 => 
                array (
                    'id' => 1,
                    'title' => 'Convenience Fee',
                    'rate_type' => 'percent',
                    'rate' => '5.00',
                    'net_price' => 'excluding',
                    'status' => 1,
                    'created_at' => '2019-09-02 11:58:43',
                    'updated_at' => '2019-09-02 11:58:43',
                ),
            ));

        }
        
        
    }

    protected function tax($field, $for)
    {
        return Tax::firstOrNew([$field => $for]);
    }
}