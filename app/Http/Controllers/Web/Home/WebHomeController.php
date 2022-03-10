<?php

namespace App\Http\Controllers\Web\Home;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Category\SubCategory;
use App\Models\Comments\ServicesComments;
use App\Models\GeneralQuestions\GeneralQuestions;
use App\Models\HomeSlider\HomeSlider;
use App\Models\Services\Service;
use App\Models\Tags\UserTags;
use App\Models\User;
use Illuminate\Http\Request;
use function GuzzleHttp\Promise\all;
use function Symfony\Component\VarDumper\Dumper\esc;

class WebHomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services_owners_ids = User::where('active','!=',0)->get()->pluck('id')->toArray();
        $services = Service::where('admin_accept',1)->whereIN('user_id',$services_owners_ids)->get();
        $categories = Category::latest()->take(6)->get();
        $labels = labels(['web.general']);
        $rabdom_categories = SubCategory:://where('is_popular',1)->
        limit(5)->get();
        return view('web.home.index',get_defined_vars());
    }

        public function home(){

            $categories = Category::get();
            $services_owners_ids = User::where('active','!=',0)->get()->pluck('id')->toArray();
            $latest_services = Service::where('user_id','!=',auth('web')->user()->id)->where('admin_accept',1)->with('images')->whereIN('user_id',$services_owners_ids)->orderBy('created_at','desc')->get();

            $random_services = Service::where('user_id','!=',auth('web')->user()->id)->where('admin_accept',1)->with('images')->whereIN('user_id',$services_owners_ids)->inRandomOrder()->take(10)->get();
            $general_questions = GeneralQuestions::orderBy('created_at','desc')->take(3)->get();
            $home_sliders = HomeSlider::latest()->take(3)->get();

            $labels = labels(['web.general']);
            return view('web.home.landing-buyer',get_defined_vars());
        }

        public function home_search(Request $request){

            $latest_services = Service::orWhere('title','like', "%$request->filter%")->get();
            if (count($latest_services)>0){
                $latest_services = Service::orWhere('title','like', "%$request->filter%")->get();
            }else{
                $latest_services = Service::get();
            }
            $categories = Category::get();
            $random_services = Service::orWhere('title','like', "%$request->filter%")->inRandomOrder()->take(10)->get();
            if (count($random_services)>0){
                $random_services = Service::orWhere('title','like', "%$request->filter%")->inRandomOrder()->take(10)->get();
            }else{
                $random_services = Service::get();
            }
            $general_questions = GeneralQuestions::orderBy('created_at','desc')->inRandomOrder()->take(10)->get();
            $home_sliders = HomeSlider::latest()->take(3)->get();
            $labels = labels(['web.general']);
            return view('web.home.landing-buyer',get_defined_vars());
        }


        public function general_search(Request $request){

            $categories= Category::get();
            $rabdom_categories = SubCategory::inRandomOrder()->limit(2)->get();
            $services_owners_ids = User::where('active','!=',0)->get()->pluck('id')->toArray();
            $services = Service::where('admin_accept',1)->whereIN('user_id',$services_owners_ids)->orWhere('title','like', "%$request->filter%")->get();
            if (count($services)>0){
              $services = Service::orWhere('title','like', "%$request->filter%")->get();
          }else{
              $services = Service::get();

          }
            $labels = labels(['web.general']);
             return view('web.home.index',get_defined_vars());

        }

        public function profile_seller($id){
            $user =User::where('id',$id)->first();
            $categories = Category::get();
            $services = Service::where('admin_accept',1)->where('user_id',$user->id)->paginate(5);
            $user_tags = UserTags::where('user_id',$user->id)->get();

            $avarage_rate = ServicesComments::where('seller_id',$id)->get()->pluck('rate')->toArray();
            if (!empty($avarage_rate)){
                $avarage_rate =     array_sum($avarage_rate)/count($avarage_rate);
                echo $avarage_rate;

            }else{
                $avarage_rate = 0;
                echo $avarage_rate;

            }

            if (!empty($avarage_rate)){
                $avarage_rate =     array_sum($avarage_rate)/count($avarage_rate);

            }else{
                $avarage_rate = 0;
            }
            $labels = labels(['web.general']);
            return view('web.services.seller_profile',get_defined_vars());

        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }
}
