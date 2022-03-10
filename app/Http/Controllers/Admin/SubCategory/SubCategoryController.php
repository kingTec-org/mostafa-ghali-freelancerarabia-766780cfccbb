<?php

namespace App\Http\Controllers\Admin\SubCategory;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Category\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $sub_category = SubCategory::with('category')->get();
            return response()->json($sub_category)->setStatusCode(200);
        }
        $categories = SubCategory::get();

        return view('dashboard.sub_category.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();
        return view('dashboard.sub_category.create', get_defined_vars());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'category' => 'required',
//            'image'=>'required',
        ]);
        $category = new SubCategory();
        $input = $request->all();
        $category->name_en = $input['name_en'];
        $category->name_ar = $input['name_ar'];
        $category->category_id = $input['category'];
        $category->is_popular = $request->boolean('is_popular');

        if ($request->has('image')){
            $image_name = saveImage($request->image ,'uploads/subcategory/' );
            $category->image = $image_name;
            $category->save();
        }
        $category->save();
        return redirect()->route('admin.sub_category.index')->with('success', 'Add Sub Category Success');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {

        $subcategory = SubCategory::where('id', $id)->first();
        $categories = Category::all();
        if (!$subcategory) {
            return view('web.error.404');
        }
        return view('dashboard.sub_category.show', get_defined_vars());


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $subcategory = SubCategory::where('id', $id)->first();
        $categories = Category::all();

        if (!$subcategory) {
            return view('web.error.404');
        }
        return view('dashboard.sub_category.edit', get_defined_vars());


    }

    public function edit_images()
    {
        $sub_categories = SubCategory::get();

        return view('dashboard.sub_category.images', get_defined_vars());


    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request)
    {

        $request->validate([
            'name_ar' => 'required',
            'name_en' => 'required',
            'category' => 'required',
        ]);

        $category = SubCategory::where('id', $request->id)->first();
        $input = $request->all();
        $category->name_en = $input['name_en'];
        $category->name_ar = $input['name_ar'];
        $category->category_id = $input['category'];
        $category->is_popular = $request->boolean('is_popular');
        if ($request->has('image')){
            $image_name = saveImage($request->image ,'uploads/subcategory/' );
            $category->image = $image_name;
            $category->save();
        }
        $category->update();
        return redirect()->route('admin.sub_category.index')->with('success', 'Update Sub Category Success');

    }
    public function update_images(Request $request)
    {

        $request->validate([
            'images' => 'required|array',
        ]);



        $categories = SubCategory::get();
        foreach($request->images as $id =>$image){
            $category = $categories->where('id', $id)->first();
            if ($image){
                $image_name = saveImage($image ,'uploads/subcategory/' );
                $category->image = $image_name;
                $category->save();
            }
        }

         return back()->with('success', 'Update Sub Category Success');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function delete(Request $request)
    {
        $category = SubCategory::findOrFail($request->id)->delete();
        return response()->json(['status' => true]);
    }
}
