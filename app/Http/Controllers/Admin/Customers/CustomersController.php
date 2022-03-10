<?php

namespace App\Http\Controllers\Admin\Customers;

use App\Http\Controllers\Controller;
use App\Models\Order\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;


class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
       if ($request->ajax()){
           $customers  = User::where('user_type',2)->get();
            return response()->json($customers);
       }
       return  view('dashboard.customers.index',get_defined_vars());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return  view('dashboard.customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name'=>'required|string',
            'email'=>'required|email|unique:users,email',
        ]);
       $customer = new User();
       $customer->name = $request->name;
       $customer->email = $request->email;
       $customer->password = bcrypt($request->password);
       $customer->user_type = 2;
       $customer->active = 1;
       $customer->is_verified = 1;
       $customer->save();
       if ($request->has('image')){
           $file_name = saveImage($request->file('image'),'uploads/user_image/');
           $customer->image = $file_name;
           $customer->save();
       }
       // todo Make Send Email To User Email With data(name , email,password)
       return redirect()->back()->with('success','Add Customer successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $user = User::where('id',$id)->first();
        if (!$user){
            return view('web.error.404');
        }
        $buy_times = count(Order::where('user_id',$id)->get()->pluck('id')->toArray());
        return  view('dashboard.customers.show',get_defined_vars());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::where('id',$id)->first();
        if (!$user){
            return view('web.error.404');
        }
        return  view('dashboard.customers.edit',get_defined_vars());

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
        $user = User::where('id',$request->id)->first();
        $request->validate([
            'email'=>['sometimes','email',Rule::unique('users')->ignore($user->id)->whereNull('deleted_at')]
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->country = $request->country;
        $user->is_verified = $request->is_verified;
        $user->education = $request->education;
        $user->university = $request->university;
        $user->work_title = $request->work_title;
        $user->description = $request->description;
        $user->graduation_date = $request->graduation_date;
        if ($request->has('image')){
            $file_name = saveImage($request->file('image'),'uploads/user_image/');
            $user->image = $file_name;
            $user->save();
        }  if ($request->has('certificate_image')){
            $file_name = saveImage($request->file('certificate_image'),'uploads/user_certificate/');
            $user->certificate_image = $file_name;
            $user->save();
        }
        $user->update();
        return redirect()->back()->with('success','Update User successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        $customer = User::findOrFail($request->id)->delete();
        return response()->json(['status'=>true]);
    }
     public function ChangeStatus(Request $request){
         $customer = User::findOrFail($request->id);
         $customer->active = $request->status == 'true' ? 1 : 0;
         $customer->update();
         return response()->json(['status' => true,'message'=>'Change Status success']);

     }
}
