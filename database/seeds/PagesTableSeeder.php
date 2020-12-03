<?php

use Illuminate\Database\Seeder;


class PagesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        
        \DB::table('pages')->insert(array (
            0 => 
            array (
                'id' => 1,
                'author_id' => 1,
                'title' => 'About Us',
                'excerpt' => 'about',
                'body' => 'Change about us content',
                'image' => NULL,
                'slug' => 'about',
                'meta_description' => 'About us description',
                'meta_keywords' => 'eventmie',
                'status' => 'ACTIVE',
                'created_at' => '2018-12-21 10:25:08',
                'updated_at' => '2019-08-22 06:45:56',
            ),
            1 => 
            array (
                'id' => 2,
                'author_id' => 2,
                'title' => 'Privacy Policy',
                'excerpt' => 'privacy',
                'body' => 'Change privacy policy',
                'image' => NULL,
                'slug' => 'privacy',
                'meta_description' => 'Privacy Policy',
                'meta_keywords' => 'privacy',
                'status' => 'ACTIVE',
                'created_at' => '2019-07-07 07:48:28',
                'updated_at' => '2019-08-22 06:43:16',
            ),
            2 => 
            array (
                'id' => 3,
                'author_id' => 1,
                'title' => 'Terms and Conditions',
                'excerpt' => 'terms',
                'body' => 'Change terms & conditions',
                'image' => NULL,
                'slug' => 'terms',
                'meta_description' => 'Terms and Conditions',
                'meta_keywords' => 'Terms and Conditions',
                'status' => 'ACTIVE',
                'created_at' => '2019-07-07 07:48:58',
                'updated_at' => '2019-08-22 06:43:04',
            ),
        ));
        
    }
    
}