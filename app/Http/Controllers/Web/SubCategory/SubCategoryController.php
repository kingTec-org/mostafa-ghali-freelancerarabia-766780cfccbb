<?php

namespace App\Http\Controllers\Web\SubCategory;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Category\SubCategory;
use App\Models\Services\Service;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index($id)
    {
        $main_category = Category::where('id', $id)->first();
        if (!$main_category) {
            return view('web.error.404');
        }
        $categories = Category::get();

        $subCategory = SubCategory::where('category_id', $id)->get();
//        $rabdom_categories = SubCategory::inRandomOrder()->limit(2)->get();
        $labels = labels(['web.general']);
        $rabdom_categories = SubCategory::where('is_popular', 1)->
        limit(5)->get();
        $breadcrumbs = [
            [
                'title' => @$labels['home'],
                'url' => url(''),
            ],
            [
                'title' => @$main_category['name_'.app()->getLocale()],
//                'url' => url('url'),
            ],
        ];
        return view('web.subCategory.cat', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function ServicesBaseSubCategory($id)
    {
        $services = Service::where('sub_category_id', $id)->with('images', 'ServiceOwner')->get();
        $sub_categories = SubCategory::findOrFail($id);
        $rabdom_categories = SubCategory::inRandomOrder()->limit(2)->get();
        $labels = labels(['web.general']);

        $breadcrumbs = [
            [
                'title' => @$labels['home']??"Home",
                'url' => url('/'),
            ],
            [
                'title' => @$sub_categories->category['name_'.app()->getLocale()],
                'url' => route('store.sub_category',$sub_categories->category),

//                'url' => url('url'),
            ],
            [
                'title' => @$sub_categories['name_'.app()->getLocale()],
//                'url' => url('url'),
            ],
        ];
        return view('web.subCategory.ServicesBaseSubCategory', get_defined_vars());

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        //
    }
}
