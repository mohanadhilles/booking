<?php

use Illuminate\Database\Seeder;
use Classiebit\Eventmie\Models\Ticket;

class TicketsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $ticket = $this->ticket('id', 1);
        if (!$ticket->exists) 
        {
        \DB::table('tickets')->insert(array (
            0 => 
            array (
                'id' => 1,
                'title' => 'Free',
                'price' => '0.00',
                'quantity' => 10000,
                'description' => 'Smile spoke total few great had never their too. Amongst moments do in arrived at my replied.',
                'event_id' => 1,
                'created_at' => '2019-09-02 13:25:04',
                'updated_at' => '2019-09-02 13:25:04',
                'status' => 1,
            ),
            1 => 
            array (
                'id' => 2,
                'title' => 'Early Bird',
                'price' => '10.00',
                'quantity' => 10000,
                'description' => 'Smile spoke total few great had never their too. Amongst moments do in arrived at my replied.',
                'event_id' => 1,
                'created_at' => '2019-09-02 13:27:57',
                'updated_at' => '2019-09-02 13:27:57',
                'status' => 1,
            ),
            2 => 
            array (
                'id' => 3,
                'title' => 'Regular',
                'price' => '20.00',
                'quantity' => 10000,
                'description' => 'Smile spoke total few great had never their too. Amongst moments do in arrived at my replied.',
                'event_id' => 1,
                'created_at' => '2019-09-02 13:28:25',
                'updated_at' => '2019-09-02 13:28:25',
                'status' => 1,
            ),
            3 => 
            array (
                'id' => 4,
                'title' => 'VIP',
                'price' => '50.00',
                'quantity' => 10000,
                'description' => 'Smile spoke total few great had never their too. Amongst moments do in arrived at my replied.',
                'event_id' => 1,
                'created_at' => '2019-09-02 13:29:08',
                'updated_at' => '2019-09-02 13:29:08',
                'status' => 1,
            ),
        ));
        }
        
    }

    protected function ticket($field, $for)
    {
        return Ticket::firstOrNew([$field => $for]);
    }
}