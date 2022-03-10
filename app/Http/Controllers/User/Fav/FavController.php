<?php

namespace App\Http\Controllers\User\Fav;

use App\Http\Controllers\Controller;
use App\Models\User\UserFav;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FavController extends Controller
{
    public function AddServiceFav($service_id){
        $user = auth('web')->user();
        $user_fav = UserFav::where('user_id',$user->id)->get()->pluck('service_id')->toArray();
        if (!in_array($service_id,$user_fav)){
            $fav = new UserFav;
            $fav->service_id = $service_id;
            $fav->user_id = auth('web')->user()->id;
            $fav->save();
            return redirect()->back()->with('alert-success','تم اضافة الخدمة الى المفضلة');
        }else{
            $ser_fav = UserFav::where('service_id',$service_id)->delete();
            return redirect()->back()->with('alert-success','تم ازالة الخدمة من المفضلة');
        }


    }
}
