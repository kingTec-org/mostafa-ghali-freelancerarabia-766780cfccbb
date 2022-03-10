<?php

namespace App\Http\Controllers\Web\Services;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Category\SubCategory;
use App\Models\Comments\ServicesComments;
use App\Models\Services\AdditionalServices;
use App\Models\Services\Service;
use App\Models\Services\ServiceImages;
use App\Models\Services\ServiceTags;
use App\Models\Services\ServicsQuestions;
use App\Models\Tags\UserTags;
use App\Models\User;
use Illuminate\Http\Request;
use function Symfony\Component\VarDumper\Dumper\esc;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $labels = labels(['web.general']);
        $categories= Category::get();
        $sub_cat = SubCategory::get();

        return view('web.services.create',get_defined_vars());
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
            'service_title'=>'required',
            'service_category_id'=>'required',
            'service_description'=>'required',
            'deliver_time'=>'required',
            'details_for_customer'=>'required',
            'service_price'=>'required',
            'media'=>'required',
            'service_tags'=>'required',
            'service_sub_category_id'=>'required',
        ]);
        $service = new Service();
        $service->title = $request->service_title;
        $service->user_id = auth('web')->user()->id;
        $service->description = $request->service_description;
        $service->deliver_time = $request->deliver_time;
        $service->details_for_customer = $request->details_for_customer;
        $service->sub_category_id = $request->service_sub_category_id;
        $service->admin_accept = 0;
        $service->price = $request->service_price;
        $service->save();
        $images = $request->media;
        foreach ($images as $image){
            $service_images  =new ServiceImages();
            $service_image = saveImage($image,'uploads/services/');
            $service_images->service_id = $service->id;
            $service_images->image = $service_image;
            $service_images->save();
        }
    if ($request->has('chk') && $request->chk =='on'){
        $additionalTitle = $request->additionalTitle1;
        $additionalProce = $request->additionalProce1;
        $additional_deliver_time = $request->additional_deliver_time;
        $addtional_time = $request->addtional_time;

        foreach ($additionalTitle as $key => $new_serv){
           if ($additionalTitle[$key] == null){
               continue;
           }
            $add_service = new AdditionalServices();
            $add_service->service_id = $service->id;
            $add_service->title = $additionalTitle[$key];
            $add_service->price = $additionalProce[$key];
            $add_service->deliver_at_same_time = $additional_deliver_time[$key];
            if ($additional_deliver_time[$key] == 0){
                $add_service->additional_days = $addtional_time[$key];
            }else{
                $add_service->deliver_time = $service->deliver_time;
                $add_service->additional_days = 0;

            }

        $add_service->save();

        }

    }
        if (!is_null($request->service_tags)){

            $tags = $request->post('service_tags');
            $tags = json_decode($tags);
            $service_tags = new ServiceTags();

            foreach ($tags as $tag){
                ServiceTags::create([
                    'service_id'=>$service->id,
                    'tag'=>$tag->value
                ]);

            }
        }
        $service_questions = new ServicsQuestions();
        $service_questions->service_id = $service->id;
        $service_questions->question = $request->question1;
        $service_questions->answer = $request->answer1;
        $service_questions->save();
        return  redirect()->back()->with('alert-success','تم اضافة الخدمة بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $categories= Category::get();
        $service = Service::where('admin_accept',1)->where('id',$id)->with('SubCategory','images')->first();
            if (!$service){
                return  view('web.error.404');
            }
        $service_images = ServiceImages::where('service_id',$service->id)->get();
        $service_tags = ServiceTags::where('service_id',$id)->get();

        $service_questions = ServicsQuestions::where('service_id',$id)->get();
        $addtional_services = AdditionalServices::where('service_id',$id)->get();
        $service_owner = User::where('id',$service->user_id)->first();
        $service_comments =ServicesComments::where('service_id',$id)->with('replay')->take(5)->get();

        $avarage_rate = ServicesComments::where('service_id',$id)->get()->pluck('rate')->toArray();

      if (!empty($avarage_rate)){
          $avarage_rate =     array_sum($avarage_rate)/count($avarage_rate);

      }else{
          $avarage_rate = 0;
      }
        $services_owners_ids = User::where('active','!=',0)->get()->pluck('id')->toArray();
        $similar_services = Service::where('user_id','!=',auth('web')->user()->id)->where('admin_accept',1)->whereIN('user_id',$services_owners_ids)->where('user_id','!=',auth('web')->user()->id)->where('sub_category_id',$service->sub_category_id)->with('ServiceOwner')->get()->take(2);

        $labels = labels(['web.general']);
        return view('web.services.service-show',get_defined_vars());

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
    }

    public function getSubCategoryBaseCategory($cat_id){

        $sub_cat = SubCategory::where('category_id',$cat_id)->get();
        $labels = labels(['web.general']);
        $items_html = view('web.services.subCategoryService',compact('sub_cat','labels'))->render();

        return response()->json([
            'status' => true,
            'items_html' => $items_html
        ]);
    }
}
