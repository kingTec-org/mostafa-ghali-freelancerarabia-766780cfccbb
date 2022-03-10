<?php

namespace App\Http\Controllers\Admin\Services;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Category\SubCategory;
use App\Models\Comments\ServicesComments;
use App\Models\Item\Item;
use App\Models\Services\AdditionalServices;
use App\Models\Services\Service;
use App\Models\Services\ServiceImages;
use App\Models\Services\ServiceTags;
use App\Models\Services\ServicsQuestions;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class AdminServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $services = Service::with('SubCategory', 'images', 'ServiceOwner')->get();
            return response()->json($services);
        }
        return view('dashboard.services.index', get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $customers = User::where('active', 1)->get();
        $categories = Category::all();
        $sub_cat = SubCategory::all();
        $labels = labels('web.general');
        return view('dashboard.services.create', get_defined_vars());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
//        dd($request->all());
        $request->validate([
            'admin_user_id' => 'required',
            'admin_service_title' => 'required',
            'admin_service_category_id' => 'required',
            'admin_service_description' => 'required',
            'admin_deliver_time' => 'required',
            'admin_details_for_customer' => 'required',
            'admin_service_price' => 'required',
            'admin_media' => 'required',
            'admin_service_tags' => 'required',
            'admin_service_sub_category_id' => 'required',
            'admin_question1' => 'required',
            'admin_answer1' => 'required',
        ]);
        $service = new Service();
        $service->title = $request->admin_service_title;
        $service->user_id = $request->admin_user_id;
        $service->description = $request->admin_service_description;
        $service->deliver_time = $request->admin_deliver_time;
        $service->details_for_customer = $request->admin_details_for_customer;
        $service->sub_category_id = $request->admin_service_sub_category_id;
        $service->admin_accept = 1;
        $service->price = $request->admin_service_price;
        $service->save();
        $images = $request->admin_media;

        foreach ($images as $image) {
            $service_images = new ServiceImages();
            $service_image = saveImage($image, 'uploads/services/');
            $service_images->service_id = $service->id;
            $service_images->image = $service_image;
            $service_images->save();
        }
        if ($request->has('admin_chk') && $request->admin_chk == 'on') {
            $additionalTitle = $request->admin_additionalTitle1;
            $additionalProce = $request->admin_additionalProce1;
            $additional_deliver_time = $request->admin_additional_deliver_time;
            $addtional_time = $request->admin_addtional_time;

            foreach ($additionalTitle as $key => $new_serv) {
                if ($additionalTitle[$key] == null) {
                    continue;
                }
                $add_service = new AdditionalServices();
                $add_service->service_id = $service->id;
                $add_service->title = $additionalTitle[$key];
                $add_service->price = $additionalProce[$key];
                $add_service->deliver_at_same_time = $additional_deliver_time[$key];
                if ($additional_deliver_time[$key] == 0) {
                    $add_service->additional_days = $addtional_time[$key];
                } else {
                    $add_service->deliver_time = $service->deliver_time;
                    $add_service->additional_days = 0;

                }

                $add_service->save();

            }

        }
        if (!is_null($request->admin_service_tags)) {

            $tags = $request->post('admin_service_tags');
            $tags = json_decode($tags);
            $service_tags = new ServiceTags();

            foreach ($tags as $tag) {
                ServiceTags::create([
                    'service_id' => $service->id,
                    'tag' => $tag->value
                ]);

            }
        }
        $service_questions = new ServicsQuestions();
        $service_questions->service_id = $service->id;
        $service_questions->question = $request->admin_question1;
        $service_questions->answer = $request->admin_answer1;
        $service_questions->save();
        return redirect()->back()->with('success', 'Add Service Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        $service = Service::where('id',$id)->with('ServiceOwner','SubCategory')->first();
        if (!$service){
            return view('web.error.404');
        }
        $times_of_buy = count(Item::where('service_id',$id)->get()->pluck('service_id')->toArray());
        $service_images = ServiceImages::where('service_id',$id)->get();
        $additional_services = AdditionalServices::where('service_id',$id)->get();
        $service_comments = ServicesComments::where('id',$id)->get();
        $service_questions = ServicsQuestions::where('service_id',$id)->get();
        $service_tags = ServiceTags::where('service_id',$id)->get();
        return view('dashboard.services.show', get_defined_vars());


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $service = Service::where('id',$id)->with('ServiceOwner','SubCategory')->first();
        if (!$service){
            return view('web.error.404');
        }
        $customers = User::where('user_type',2)->get();
        $times_of_buy = count(Item::where('service_id',$id)->get()->pluck('service_id')->toArray());
        $service_images = ServiceImages::where('service_id',$id)->get();
        $additional_services = AdditionalServices::where('service_id',$id)->get();
        $service_comments = ServicesComments::where('id',$id)->get();
        $service_questions = ServicsQuestions::where('service_id',$id)->get();
        $service_tags = ServiceTags::where('service_id',$id)->get();
        $categories = Category::all();
        $sub_cat = SubCategory::all();
        return view('dashboard.services.edit', get_defined_vars());
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function delete(Request $request)
    {
        $service = Service::findOrFail($request->id)->delete();
        return response()->json(['status' => true]);
    }

    public function accept(Request $request)
    {
        $service = Service::where('id', $request->id)->first();
        $service->admin_accept = 1;
        $service->update();
        return response()->json(['status' => true]);
    }

    public function getSubCategoryBaseCategory($cat_id)
    {


        $sub_cat = SubCategory::where('category_id', $cat_id)->get();
        $items_html = view('dashboard.services.subCategoryService', compact('sub_cat'))->render();
        return response()->json([
            'status' => true,
            'items_html' => $items_html
        ]);
    }

    public function createAdditionalService($id){
        $id = $id;
        return view('dashboard.services.create_additional_service', get_defined_vars());
    }
    public function storeAdditionalService(Request $request){
        $request->validate([
            'title'=>'required',
            'deliver_at_same_time'=>'required',
            'additional_days'=>'required_if:deliver_at_same_time,==,0',
            'price'=>'required',
        ]);

        $service =new AdditionalServices();
        $original_service = Service::where('id',$request->service_id)->first();
        $service->service_id = $request->service_id;
        $service->price = $request->price;
        $service->deliver_at_same_time = $request->deliver_at_same_time;
        if ($request->deliver_at_same_time == 1){
            $service->deliver_time = $original_service->deliver_time;
            $service->additional_days = 0;
            $service->save();

        }else{
            $service->deliver_time = 0;
            $service->additional_days  = $request->additional_days;
            $service->save();

        }
        $service->save();
        return redirect()->route('admin.services.edit',$service->service_id)->with('success','Create Additional service Successfully');

    }

    public function editAdditionalService($id){
        $service = AdditionalServices::where('id',$id)->first();
        if (!$service){
            return view('web.error.404');
        }
        return view('dashboard.services.edit_additional_service', get_defined_vars());

    }

    public function deleteAdditionalService($id){
        $service = AdditionalServices::where('id',$id)->first();
        if (!$service){
            return view('web.error.404');
        }
        $service->delete();
        return redirect()->route('admin.services.edit',$service->service_id)->with('success','Delete Additional service Successfully');

    }
    public function updateAdditionalService(Request $request){
        $request->validate([
            'title'=>'required',
            'deliver_at_same_time'=>'required',
            'additional_days'=>'required_if:deliver_at_same_time,==,0|min:1',
            'price'=>'required',
        ]);

        $service = AdditionalServices::where('id',$request->id)->first();
        $original_service = Service::where('id',$service->service_id)->first();
           $service->title  =$request->title;
           $service->deliver_at_same_time  =$request->deliver_at_same_time;
           if ($request->deliver_at_same_time == 1){
               $service->deliver_time = $original_service->deliver_time;
               $service->additional_days = 0;
               $service->update();

           }else{
               $service->deliver_time = 0;
               $service->additional_days  = $request->additional_days;
               $service->update();

           }
           $service->price  =$request->price;
           $service->update();
        return redirect()->route('admin.services.edit',$service->service_id)->with('success','Update Additional service Successfully');

    }

}
