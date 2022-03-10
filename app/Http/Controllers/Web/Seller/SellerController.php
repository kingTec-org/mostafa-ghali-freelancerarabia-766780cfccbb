<?php

namespace App\Http\Controllers\Web\Seller;

use App\Http\Controllers\Controller;
use App\Models\Category\Category;
use App\Models\Category\SubCategory;
use App\Models\Languages;
use App\Models\Tags\UserTags;
use App\Models\User;
use App\Models\User\UserLanguages;
use App\Models\User\UserOccupation;
use App\Models\User\UserSubCategory;
use Illuminate\Http\Request;

class SellerController extends Controller
{

    public function start_selling()
    {
        $categories = Category::get();

        return view('web.seller.start_seller', get_defined_vars());
    }

    public function seller_on_boarding(Request $request)
    {

        $labels = labels(['web.general']);

        $user = auth()->user();
        $Languages = Languages::get();

        $languages_level = UserLanguages::LevelList;
        $categories = Category::get();
        $sub_categories = SubCategory::get();
        $user_languages = UserLanguages::where('user_id', $user->id)->get();
        $user_occupations = UserOccupation::where('user_id', $user->id)->first();
        $user_sub_categories  = UserSubCategory::where('user_id', $user->id)->pluck('sub_category_id')->toArray();
        if ($user_occupations)
            $sub_categories_list= $sub_categories->where('category_id',$user_occupations->id) ;
        else
        $sub_categories_list= $sub_categories->where('category_id',@$categories->first()->id)  ;

        $request->session('category', $request->category);

        return view('web.seller.seller_profile', get_defined_vars());
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_seller(Request $request)
    {

        $user = auth('web')->user();
        $user->name = $request->user_name;
        $user->work_title = $request->work_title;
        $user->education = $request->education;
        $user->university = $request->university;
        $user->graduation_date = $request->graduation_date;
        $user->description = $request->description;
        $user->country = $request->country;

         $user->customer_type = User::Customer_Type['customer'];
         $user->service_owner = 1;

        if ($request->session()->has('category'))
            $user->category_id = $request->session()->get('category');

        if ($request->has('image')) {
            $user_image = saveImage($request->file('image'), 'uploads/user_image/');
            $user->image = $user_image;
        }
        if ($request->has('certificates')) {
            $certificates_image = saveImage($request->file('certificates'), 'uploads/user_certificate/');
            $user->certificate_image = $certificates_image;
        }
        $user->save();

        if (!is_null($request->skills)) {
            $old_tags = UserTags::where('user_id', auth('web')->user()->id)->get();
            foreach ($old_tags as $tag) {
                $tag->delete();
            }
            $tags = $request->post('skills');

//            dd($tags,$request->all());
//            $tags = json_decode($tags);
//            $user_tags = new UserTags();
//            foreach ($tags as $tag) {
//                UserTags::create([
//                    'user_id' => $user->id,
//                    'tag' => $tag->value
//                ]);
//
//            }
        }


        /** start  update user  lang **/
         $lang_ids = [];
        foreach ($request->get('languages', []) as  $us_lang) {
            $lang_ids[] = $us_lang['language_id'];
            UserLanguages::updateOrCreate(['language_id' => $us_lang['language_id'], 'user_id' => $user->id], ['level' => $us_lang['level']]);
        }

        UserLanguages::where('user_id', $user->id)->whereNotIn('language_id', $lang_ids)->delete();
        /**end  update  user  lang **/

        /** start  update user  Occupation **/
        $new_occupation = [];
        foreach ($request->get('occupation', []) as $index => $item) {
            $new_occupation[] = $item['category_id'];

            $item = UserOccupation::updateOrCreate(['user_id' => $user->id], ['category_id' => $item['category_id'], 'from' => $item['from'], 'to' => $item['to']]);
            if ($index == 0) {


                $sub_cat_ids = $request->get('sub_categories', []);
                $item->userSubCategories()->whereNotIn('id', $sub_cat_ids)->delete();

                $list_sub_formated = [];
                foreach ($sub_cat_ids as $one) {
                    $list_sub_formated[] = [
                        'user_id' => $user->id,
                        'user_occupation_id' => $item->id,
                        'category_id' => $item->category_id,
                        'sub_category_id' => $one
                    ];

                }

                UserSubCategory::upsert($list_sub_formated, ['user_id', 'user_occupation_id'], ['category_id', 'sub_category_id']);


            }

        }

        UserOccupation::where('user_id', $user->id)->whereNotIn('category_id', $new_occupation)->delete();

        /**end  update  user  Occupation **/


        return redirect()->back()->with('alert-success', 'Profile Update Successfully');
    }


}
