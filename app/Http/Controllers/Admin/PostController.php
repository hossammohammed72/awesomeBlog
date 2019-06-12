<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use Auth;

// models
use App\Models\Category;
use App\Models\Post;
use App\Models\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.post.index')->with([
            'posts' => Post::all(),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.post.create')->with(
            ['categories'=>Category::all()]
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validator = Validator::make($request->all(), [
            'title' => 'required|min:3|',
             'content'=>'required|min:3|string',
             'categories'=>'required',
             'image'=>'image|mimes:jpeg,png,PNG,jpg,JPG,jpge,gif,svg|max:2048'
            ]);
        if ($validator->fails())   
           return response()->json(array('errors' => $validator->getMessageBag()->toArray()));
        $post = new Post();
        $post->content = $request->input('content');
        $post->title = $request->input('title');
        $post->user_id = Auth::user()->id;
      
        $post->save();
        $this->attachPostCategories($post,$request->categories);
        if($request->hasFile('photos'))
            $this->savePostImages($post,$request->file('photos'));
        return response()->json(['success'=>1],200);
    }
    private function savePostImages(Post $post,$images){
        foreach ($images as $imageInput){
            $filename = $imageInput->getClientOriginalName();
            $path = $imageInput->store('posts');
            Image::insert([
                'post_id'=>$post->id,
                'url'=>$path
            ]);
            
        }
        return true;
    }
    private function attachPostCategories(Post $post,$categories){
        foreach ($categories as $category)
        $post->categories()->attach($category);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
        $post->images();
        return view('front.post')->with(['post'=>$post]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDeleted = Post::find($id)->delete();
       if(!$isDeleted)
            return response()->json(['error'=>'1'],500);
    }
}
