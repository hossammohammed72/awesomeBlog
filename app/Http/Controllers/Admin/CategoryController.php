<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
// models 
use App\Models\Category;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('admin.category.index')->with([
            'categories' => $this->allCategories(),
        ]);
    }
    public function categoriesinJson(){
        return response()->json(['categories'=>$this->allCategories()],200);
    }

    public function allCategories(){
        $categories= Category::withCount('posts')->orderBy('posts_count','desc')->get();
        foreach($categories as $category)
        $category->url = $category->url();
        return $categories;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');

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
        $validator = Validator::make($request->all(),[
            'name'=>'string|required',
            'description'=>'string|min:10'
        ]);
        if($validator->fails())
            return response()->json(['error'=>$validator->getMessageBag()->toArray()],400);
            $category = new Category();
            $category->name = $request->input('name');
            $category->description = $request->input('description');
            $category->save();
            return response()->json($category,200);
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
       $isDeleted = Category::find($id)->delete();
       if(!$isDeleted)
            return response()->json(['error'=>'1'],500);
    }
}
