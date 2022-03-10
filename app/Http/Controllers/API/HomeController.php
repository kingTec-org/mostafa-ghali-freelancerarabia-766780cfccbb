<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use phpDocumentor\Reflection\Types\Null_;

class HomeController extends Controller
{
    public function home(Request $request){

        $user = DB::table('users')->where('id', $request['userID'])->first();
        $services = DB::table('category')->get(['id','name_ar', 'name_en', 'image']);
        $recentServices = DB::table('service as s')->leftJoin('users as u', 's.user_id', '=', 'u.id')->where('s.deleted_at', NULL)->limit(10)->get(['s.*', 'u.*', 'u.id as userID', 's.id as serviceID']);
        $orders = DB::table('orders as o')->leftJoin('order_items as ot', 'ot.order_id', '=', 'o.id')->where('o.deleted_at', NULL)->where('ot.is_complete',0)->where('o.user_id', $request['userID'])->get(['o.*', 'ot.*', 'o.id as orderID', 'ot.id as orderItemID']);

        // Recent Services
        if (!empty($recentServices)) {
          foreach ($recentServices as $recentService) {
                $recentService->rating = DB::table('service_comments')->where('service_id', $recentService->serviceID)->avg('rate');
                $recentService->comment = DB::table('service_comments')->where('service_id', $recentService->serviceID)->count('comment');
          }
        }
        // Orders
        if (!empty($orders)) {
            foreach ($orders as $order) {
                $order->service= DB::table('service')->where('id', $order->service_id)->first();
                $order->user= DB::table('users')->where('id', $order->user_id)->first();
            }
        }

        // Check User
        if (empty($user)) {
            return response([
                'message' => 'User ID Does NOt Exist',
            ], 422);
        }else{
            $data = compact('services', 'recentServices', 'orders');
            return response($data, 200);
        }

    }

    public function myActiveOrders(Request $request){

        $user = DB::table('users')->where('id', $request['userID'])->first();

        $orders = DB::table('orders as o')->leftJoin('order_items as ot', 'ot.order_id', '=', 'o.id')->where('o.deleted_at', NULL)->where('ot.is_complete',0)->where('o.user_id', $request['userID'])->get(['o.*', 'ot.*', 'o.id as orderID', 'ot.id as orderItemID']);


        // Orders
        if (!empty($orders)) {
            foreach ($orders as $order) {
                $order->service= DB::table('service')->where('id', $order->service_id)->first();
                $order->user= DB::table('users')->where('id', $order->user_id)->first();
            }
        }

        // Check User
        if (empty($user)) {
            return response([
                'message' => 'User ID Does NOt Exist',
            ], 422);
        }else{
            $data = compact('orders');
            return response($data, 200);
        }

    }

    public function allOrders(Request $request){

        $user = DB::table('users')->where('id', $request['userID'])->first();

        $orders = DB::table('orders as o')->leftJoin('order_items as ot', 'ot.order_id', '=', 'o.id')->where('o.deleted_at', NULL)->where('o.user_id', $request['userID'])->get(['o.*', 'ot.*', 'o.id as orderID', 'ot.id as orderItemID']);


        // Orders
        if (!empty($orders)) {
            foreach ($orders as $order) {
                $order->service= DB::table('service')->where('id', $order->service_id)->first();
                $order->user= DB::table('users')->where('id', $order->user_id)->first();
            }
        }

        // Check User
        if (empty($user)) {
            return response([
                'message' => 'User ID Does NOt Exist',
            ], 422);
        }else{
            $data = compact('orders');
            return response($data, 200);
        }

    }

    public function mySavedService(Request $request){

        $user = DB::table('users')->where('id', $request['userID'])->first();
        $Services = DB::table('fav_services as s')->leftJoin('service as se', 'se.id', '=', 's.service_id')->leftJoin('users as u', 's.user_id', '=', 'u.id')->where('s.deleted_at', NULL)->get(['s.*', 'u.*', 'u.id as userID', 's.id as serviceID']);


        // Orders
        if (!empty($Services)) {
          foreach ($Services as $recentService) {
                $recentService->rating = DB::table('service_comments')->where('service_id', $recentService->serviceID)->avg('rate');
                $recentService->comment = DB::table('service_comments')->where('service_id', $recentService->serviceID)->count('comment');
          }
        }
        // Check User
        if (empty($user)) {
            return response([
                'message' => 'User ID Does NOt Exist',
            ], 422);
        }else{
            $data = compact('Services');
            return response($data, 200);
        }

    }

    public function profileDetail(Request $request){

        $user = DB::table('users')->where('id', $request['userID'])->first();

        $Profile = DB::table('users')->where('users.id', $request['userID'])->first();
        // Check User
        if (empty($user)) {
            return response([
                'message' => 'User ID Does NOt Exist',
            ], 422);
        }else{
            $data = compact('Profile');
            return response($data, 200);
        }

    }

    public function searchGig(Request $request){

        // $user = DB::table('users')->where('id', $request['userID'])->first();

        $results = DB::table('service')->where('title', 'LIKE', "%".$request['name']."%")->get();
        // Check User
        if (empty($request['name'])) {
            return response([
                'message' => 'Name should not be empty',
            ], 422);
        }else{
            $data = compact('results');
            return response($data, 200);
        }

    }

    public function saveService(Request $request){
        // $user = DB::table('users')->where('id', $request['userID'])->first();

        if (empty($request['userID']) || empty($request['serviceID'])) {
                    return response([
                        'message' => 'Both Params are required',
                    ], 422);
        }else{
            $results = DB::table('fav_services')->insert([
            'service_id' => $request['serviceID'],
            'user_id' => $request['userID'],
            ]);
            $data = array('msg'=>'Data Saved');
            return response($data, 200);
        }
    }

    public function getServicesdetail(Request $request){
        $request->validate([
            'serviceId' => 'required|integer|exists:service,id',
        ]);
        $service = DB::table('service as s')->join('users as u', 's.user_id', '=', 'u.id')->where('s.id', $request['serviceId'])->where('s.deleted_at', NULL)->first(['s.*', 'u.*', 's.id as ServiceID', 'u.id as UserID', 'u.created_at as UserCreatedAt', 's.created_at as ServiceCreatedAt']);
        $service->additionalServices = DB::table('additional_services')->where('service_id', $service->ServiceID)->get();
        $service->comments = DB::table('service_comments')->where('service_id', $service->ServiceID)->get();
        $service->tags = DB::table('service_tags')->where('service_id', $service->ServiceID)->get();
        $service->questions = DB::table('service_questions')->where('service_id', $service->ServiceID)->get();
        $data = compact('service');
        return response($data, 200);
    }

    public function delFavService(Request $request){
        $request->validate([
            'userId' => 'required|integer|exists:fav_services,user_id'
        ]);
        DB::table('fav_services')->where('user_id', $request['userId'])->delete();
        $data = ['msg' => 'Data Deleted Successfully'];
        return  response($data, 200);
    }

    public function addService(Request $request){
        $request->validate([
            'title' => 'required',
            'subCategory' => 'required',
            'description' => 'required',
            'searchTags' => 'required',
            'questions' => 'required',
            'title_basic' => 'required',
            'description_basic' => 'required',
            'deliveryTime_basic' => 'required',
            'revisions_basic' => 'required',
            // 'mainServices_basic' => 'required',
            // 'extraServices_basic' => 'required',
            'title_standard' => 'required',
            'description_standard' => 'required',
            'price_basic' => 'required',
            'deliveryTime_standard' => 'required',
            'revisions_standard' => 'required',
            // 'mainServices_standard' => 'required',
            // 'extraServices_standard' => 'required',
            'price_standard' => 'required',
            'title_premium' => 'required',
            'description_premium' => 'required',
            'deliveryTime_premium' => 'required',
            'revisions_premium' => 'required',
            // 'mainServices_premium' => 'required',
            // 'extraServices_premium' => 'required',
            'price_premium' => 'required',
            'image' => 'required',
            'userId' => 'required',
        ]);

        $imageName = time().'.'.$request->image->extension();
        $request->image->move(public_path('images'), $imageName);

        $serviceID = DB::table('service')->insertGetId([
            'user_id' => $request['userId'],
            'title' => $request['title'],
            'description' => $request['description'],
            'sub_category_id' => $request['subCategory'],
            'image' => $imageName,
            'price' => $request['price'],
            'created_at' => now(),
        ]);

        DB::table('additional_services')->insert([
            'service_id' => $serviceID,
            'title' => $request['title_basic'],
            'price' => $request['price_basic'],
            'description' => $request['description_basic'],
            'deliver_time' => $request['deliveryTime_basic'],
            'additional_days' => $request['revisions_basic'],
        ]);
        DB::table('additional_services')->insert([
            'service_id' => $serviceID,
            'title' => $request['title_standard'],
            'price' => $request['price_standard'],
            'description' => $request['description_standard'],
            'deliver_time' => $request['deliveryTime_standard'],
            'additional_days' => $request['revisions_standard'],
        ]);
        DB::table('additional_services')->insert([
            'service_id' => $serviceID,
            'title' => $request['title_premium'],
            'price' => $request['price_premium'],
            'description' => $request['description_premium'],
            'deliver_time' => $request['deliveryTime_premium'],
            'additional_days' => $request['revisions_premium'],
        ]);

        foreach ($request['searchTags'] as $key => $value) {
            $insert[] = [
                'service_id' => $serviceID,
                'tag' => $value,
                'created_at' => now(),
            ];
        }
        DB::table('service_tags')->insert($insert);

        DB::table('service_questions')->insert([
            'service_id' => $serviceID,
            'question' => $request['questions'],
            'created_at' => now(),
        ]);
        $data = ['msg' => 'Data Successfully Saved'];
        return response($data, 200);
    }

    public function recentlyViewPost(Request $request){
        $request->validate([
            'userId' => 'required|integer|exists:users,id',
            'serviceId' => 'required|integer|exists:service,id',
        ]);
        $check = DB::table('recently_views')->where('user_id',$request['userId'])->where('service_id', $request['serviceId'])->first(['id']);
        if (!empty($check)) {
            DB::table('recently_views')->where('id', $check->id)->delete();
        }
        DB::table('recently_views')->insert([
            'service_id' => $request['serviceId'],
            'user_id' => $request['userId'],
        ]);
        $data = ['msg' => 'Data Successfully Saved'];

        return response($data, 200);
    }

    public function recentlyViewGet(Request $request){
        $request->validate([
            'userId' => 'required|integer|exists:users,id',
        ]);

        $recentlyViews = DB::table('recently_views as rv')->leftJoin('service as s', 'rv.service_id', '=', 's.id')->where('rv.user_id', $request['userId'])->get(['rv.id as rvID',  's.*', 's.id as serviceID', 'rv.user_id as userID']);

        $data = ['msg' => 'Data Successfully Saved'];

        return response(compact('recentlyViews'), 200);
    }

    public function onlineStatus(Request $request){
        $request->validate([
            'userId' => 'required|integer|exists:users,id',
            'status' => 'required',
        ]);

        if ($request['status'] == 'online') {
            $data = ['msg' => 'You Are Online Now'];
            return response($data, 200);
        }
        if ($request['status'] == 'offline') {
            $data = ['msg' => 'You Are Offline Now'];
            return response($data, 200);

        }

    }
}
