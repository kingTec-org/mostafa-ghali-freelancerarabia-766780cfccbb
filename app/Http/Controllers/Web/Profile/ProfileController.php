<?php

namespace App\Http\Controllers\Web\Profile;

use App\Http\Controllers\Controller;
use App\Models\Tags\UserTags;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = UserTags::where('user_id',auth('web')->user()->id)->get()->pluck('tag')->toArray();
       $tags = implode(',',$tags);
        $labels = labels(['web.general']);
        return view('web.profile.index',get_defined_vars());
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
    public function update(Request $request)
    {
        $user = auth('web')->user();
        $user->name = $request->user_name;
        $user->work_title = $request->work_title;
        $user->education = $request->education;
        $user->university = $request->university;
        $user->graduation_date = $request->graduation_date;
        $user->description = $request->description;
        $user->country = $request->country;
        if ($request->has('image')){
            $user_image = saveImage($request->file('image'),'uploads/user_image/');
            $user->image = $user_image;
            $user->update();
        }
        if ($request->has('certificates')){
            $certificates_image = saveImage($request->file('certificates'),'uploads/user_certificate/');
            $user->certificate_image = $certificates_image;
            $user->update();
        }

        if (!is_null($request->skills)){
            $old_tags = UserTags::where('user_id',auth('web')->user()->id)->get();
            foreach ($old_tags as $tag){
                $tag->delete();
            }
            $tags = $request->post('skills');
            $tags = json_decode($tags);
            $user_tags = new UserTags();

                foreach ($tags as $tag){
                    UserTags::create([
                        'user_id'=>$user->id,
                        'tag'=>$tag->value
                    ]);

            }
        }

      $user->update();
     return redirect()->back()->with('alert-success','Profile Update Successfully');
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
