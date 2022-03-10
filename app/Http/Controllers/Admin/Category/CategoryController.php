<?php

namespace App\Http\Controllers\Admin\Category;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $categories = Category::get();

            return response()->json($categories)->setStatusCode(200);
        }
       return view('dashboard.category.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('dashboard.category.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar'=>'required',
            'name_en'=>'required',
            'image'=>'required',
        ]);
        $category = new Category();
        $input = $request->all();

        $category->name_en =$input['name_en'];
        $category->name_ar =$input['name_ar'];
        if ($request->has('image')){
            $image_name = saveImage($request->image ,'uploads/categories/' );
            $category->image = $image_name;
            $category->save();
        }
        $category->save();
        return redirect()->back()->with('success','Add Category Success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::where('id',$id)->first();
        if (!$category){
            return view('web.error.404');
        }
        return view('dashboard.category.show',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::where('id',$id)->first();
        if (!$category){
            return view('web.error.404');
        }
        return view('dashboard.category.edit',get_defined_vars());
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $request->validate([
            'name_ar'=>'required',
            'name_en'=>'required',
        ]);
        $category = Category::where('id',$request->id)->first();
        $input = $request->all();

        $category->name_en = $input['name_en'];
        $category->name_ar = $input['name_ar'];
        if ($request->has('image')){
            $image_name = saveImage($request->image ,'uploads/categories/' );
            $category->image = $image_name;
            $category->update();
        }
        $category->update();
        return redirect()->back()->with('success','Update Category Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $category = Category::findOrFail($request->id)->delete();
        return response()->json(['status'=>true]);
    }
}
