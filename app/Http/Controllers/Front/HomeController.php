<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// models 
use App\Models\Category;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $topCategories = $this->topCategories();
        return view('front.home')->with(
            [
                'topcategories'=>$topCategories
            ]
        );
    }
    private function topCategories($limit=3){
        $categories = Category::with('posts')->withCount('posts')->orderBy('posts_count','desc')->limit($limit)->get();
        foreach($categories as $key=> $category)
            foreach($categories[$key]->posts as $postKey=> $post){
                $categories[$key]->posts[$postKey]->url = $categories[$key]->posts[$postKey]->url();
                if($categories[$key]->posts[$postKey]->images() !== null )
                    $categories[$key]->posts[$postKey]->imageUrl = $post->images()->get()[0]->imageUrl();
            }
            return $categories;
    }

}
