<?php

use Illuminate\Database\Seeder;
use Classiebit\Eventmie\Models\Post;

class PostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $post = $this->post('id', 1);
        if (!$post->exists) 
        {
        \DB::table('posts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'author_id' => 1,
                'category_id' => 1,
                'title' => 'How Eventmie Works For Organisers',
                'seo_title' => NULL,
                'excerpt' => NULL,
                'body' => '<p><strong>Post demo content</strong>',
                'image' => 'posts/September2019/fTER87e1L3Oz3jVk5hBm.jpg',
                'slug' => 'how-eventmie-works-for-organisers',
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'status' => 'PUBLISHED',
                'featured' => 0,
                'created_at' => '2019-09-03 06:36:14',
                'updated_at' => '2019-09-03 06:36:14',
            ),
            1 => 
            array (
                'id' => 2,
                'author_id' => 1,
                'category_id' => 1,
                'title' => 'How Eventmie Works For Customers',
                'seo_title' => NULL,
                'excerpt' => NULL,
                'body' => '<p><strong>Post demo content</strong>',
                'image' => 'posts/September2019/yfPw86UOUDYc4WDgUCrG.jpg',
                'slug' => 'how-eventmie-works-for-customers',
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'status' => 'PUBLISHED',
                'featured' => 0,
                'created_at' => '2019-09-03 06:36:43',
                'updated_at' => '2019-09-03 06:36:43',
            ),
            2 => 
            array (
                'id' => 3,
                'author_id' => 1,
                'category_id' => 1,
                'title' => 'How Eventmie Works As Multi-Vendor',
                'seo_title' => NULL,
                'excerpt' => NULL,
                'body' => '<p><strong>Post demo content</strong>',
                'image' => 'posts/September2019/zU68cPYMfcWlVD7bKIrB.jpg',
                'slug' => 'how-eventmie-works-as-multi-vendor',
                'meta_description' => NULL,
                'meta_keywords' => NULL,
                'status' => 'PUBLISHED',
                'featured' => 0,
                'created_at' => '2019-09-03 06:37:10',
                'updated_at' => '2019-09-03 06:37:10',
            ),
        ));
        
    }
    }

    protected function post($field, $for)
    {
        return Post::firstOrNew([$field => $for]);
    }
}