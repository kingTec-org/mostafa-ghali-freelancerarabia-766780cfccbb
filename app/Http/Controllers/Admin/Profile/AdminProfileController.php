<?php

namespace App\Http\Controllers\Admin\Profile;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
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
    public function edit()
    {
        $admin = auth('admin')->user();
        if (!$admin){
            return view('web.error.404');

        }
        return view('dashboard.profile.profile');
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

    public function general_info(Request $request){
        $user = Admin::where('id',$request->id)->first();
        $user->update([
            'email'=>$request->email,
            'name'=>$request->name,
        ]);
        if ($request->has('image')){
            $file_name = saveImage($request->file('image'),'uploads/admin_image');
            $user->image = $file_name;
            $user->update();
        }

            $msg ='Profile Updated Successfully';


        return redirect()->back()->with(['success'=>$msg]);

    }

    public function update_password(Request $request){

        $msg = 'The new password must match the confirmation';

        $request->validate([
            'password' => 'sometimes', 'nullable',
            'password_confirm' => 'nullable|same:password'
        ],[
            'password_confirm.same'=>$msg
        ]);
        $auth_user = auth('admin')->user()->id;

        $user = Admin::findOrFail($auth_user);
        $origenalpassword = auth('admin')->user()->password;

        if (Hash::check($request->oldpassword, $origenalpassword)) {
            //bcrept password and update
            if ($request->filled('password')) {
                $user->update([
                    'password' => bcrypt($request->password),
                ]);
            }
        } else {
            return redirect()->back()->with('error', 'password in not correct');
        }

        //ignore id and password_confirmation in save
        unset($request['id']);
        unset($request['password_confirm']);
        return redirect()->back()->with(['success'=> 'update password successfully']);
    }
}
