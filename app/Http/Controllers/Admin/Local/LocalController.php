<?php

namespace App\Http\Controllers\Admin\Local;
use App\Models\GeneralQuestions\GeneralQuestions;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Services\Service;
use App\Models\Tags\UserTags;
use App\Models\User;
use Illuminate\Http\Request;

class LocalController extends Controller
{
    public function switchLang($lang)
    {
        if (!empty($lang) && in_array($lang,['ar','en'])) {
            session(['lang' => $lang]);
        }

        return redirect()->back();
    }

    public function service_owner(){
        $user = auth('web')->user();
        $user->update([
            'service_owner'=>1
        ]);
        $categories = Category::get();
        $services_owners_ids = User::where('active','!=',0)->get()->pluck('id')->toArray();
        $services = Service::where('admin_accept',1)->where('user_id',$user->id)->paginate(5);
        $user_tags = UserTags::where('user_id',$user->id)->get();
        $labels = labels(['web.general']);
        return view('web.services.profile-seller',get_defined_vars());

    }
    public function terms_conditions(){

        return view('web.home.terms_conditions');
    }

    public function common_questions(){
        $general_questions = GeneralQuestions::orderBy('created_at','desc')->take(3)->get();

        return view('web.home.common_questions',compact('general_questions'));
    }
    public function privacy(){
        return view('web.home.privacy');
    }
    public function about_us(){
        return view('web.home.about_us');
    }
}
