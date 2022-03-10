<?php

namespace App\Http\Controllers\Admin\HomeSlider;

use App\Http\Controllers\Controller;
use App\Models\HomeSlider\HomeSlider;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class HomeSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $home_slider = HomeSlider::all();
            return response()->json($home_slider);
        }
        return view('dashboard.home_slider.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('dashboard.home_slider.create');

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
            'title_1_ar' => 'required',
            'title_2_ar' => 'required',
            'title_1_en' => 'required',
            'title_2_en' => 'required',
            'description_1_ar' => 'required',
            'description_2_ar' => 'required',
            'description_1_en' => 'required',
            'description_2_en' => 'required',
            'image' => 'required',
        ]);
        $home_slider = new HomeSlider();
        $image = saveImage($request->file('image'),'uploads/home_slider/');
        $home_slider->create([
            'title_1_ar'=>$request->title_1_ar,
            'title_2_ar'=>$request->title_2_ar,
            'title_1_en'=>$request->title_1_en,
            'title_2_en'=>$request->title_2_en,
            'description_1_ar'=>$request->description_1_ar,
            'description_2_ar'=>$request->description_2_ar,
            'description_1_en'=>$request->description_1_en,
            'description_2_en'=>$request->description_2_en,
            'image'=>$image
        ]);

        return redirect()->route('admin.home_slider.index')->with('success','Add Home Slider Successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $home_slider = HomeSlider::where('id',$id)->first();
        if (!$home_slider){
            return view('web.error.404');

        }
        return view('dashboard.home_slider.show',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $home_slider = HomeSlider::where('id',$id)->first();
        if (!$home_slider){
            return view('web.error.404');

        }
        return view('dashboard.home_slider.edit',get_defined_vars());
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
            'title_1_ar' => 'required',
            'title_2_ar' => 'required',
            'title_1_en' => 'required',
            'title_2_en' => 'required',
            'description_1_ar' => 'required',
            'description_2_ar' => 'required',
            'description_1_en' => 'required',
            'description_2_en' => 'required',
            'image' => 'sometimes',
        ]);
        $home_slider =  HomeSlider::where('id',$request->id)->first();

        $home_slider->update([
            'title_1_ar'=>$request->title_1_ar,
            'title_2_ar'=>$request->title_2_ar,
            'title_1_en'=>$request->title_1_en,
            'title_2_en'=>$request->title_2_en,
            'description_1_ar'=>$request->description_1_ar,
            'description_2_ar'=>$request->description_2_ar,
            'description_1_en'=>$request->description_1_en,
            'description_2_en'=>$request->description_2_en,

        ]);
        if ($request->has('image')){
            $image = saveImage($request->file('image'),'uploads/home_slider/');
            $home_slider->image = $image;
            $home_slider->update();
        }


        return redirect()->route('admin.home_slider.index')->with('success','Add Home Slider Successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function delete(Request $request)
    {
        $h_slider = HomeSlider::findOrFail($request->id)->delete();
        return response()->json(['status' => true]);
    }
}
