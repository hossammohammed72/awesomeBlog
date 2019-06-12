<?php

use Illuminate\Database\Seeder;

use App\Models\Post;
class CategoryPostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $posts = Post::all();
        foreach($posts as $post){
            for($i=0;$i<3;$i++)
            DB::table('category_post')->insert([
                'post_id'=>$post->id,
                'category_id'=>App\Models\Category::inRandomOrder()->first()->id,
            ]);    
        }
    }
}
