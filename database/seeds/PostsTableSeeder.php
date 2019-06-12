<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for($i=0;$i<15;$i++){
        $faker = Faker\Factory::create();
	        $post = new App\Models\Post;
	        $post->title = $faker->title;
            $post->content = $faker->text;
            $post->user_id = App\User::inRandomOrder()->first()->id;  
            $post->save();
            $image = new App\Models\Image();
            $image->url = 'posts/blog-'.rand(1,7).'.jpg';
            $image->post_id=$post->id;      
            $image->save();
        }
            
    }
}
