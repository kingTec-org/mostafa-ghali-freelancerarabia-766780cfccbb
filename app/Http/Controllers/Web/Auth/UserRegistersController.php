<?php

namespace App\Http\Controllers\Web\Auth;

use App\Http\Controllers\Controller;
use App\Mail\Web\VerifyCodeEmail;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserRegistersController extends Controller
{
    use RegistersUsers;

    public function register(Request $request){

        $this->validate($request,[
            'user_name' => ['required', 'string', 'max:255'],
            'user_email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
            'user_password' => ['required', 'string',
//                'min:9',             // must be at least 10 characters in length
//                'regex:/[a-z]/',      // must contain at least one lowercase letter
//                'regex:/[A-Z]/',      // must contain at least one uppercase letter
//                'regex:/[0-9]/',      // must contain at least one digit
//                'regex:/[@$!%*#?&]/'
            ],
        ],[
           'user_password.regex'=>'كلمة المرور يجب ان تحتوي على احرف صغيرة و كبيرة و رموز ',
           'user_password.min'=>'كلمة المرور يجب ان تكون 10 خانات ',
        ]);
        try{
            $user = $this->create($request->all());
            return redirect()->back()->with(['alert-verification'=> 'لقد تم التسجيل يجب تأكيد الحساب']);
        }catch (\Exception $e){
            return redirect()->back()->with(['alert-fail-send-otp'=> $e->getMessage()]);
        }

    }

    protected function guard()
    {
        return Auth::guard('web');
    }

    protected function create(array $data)
    {

        $otp = rand(1000,9999);
        $user=  User::create([
            'name' => $data['user_name'],
            'email' => $data['user_email'],
            'password' => Hash::make($data['user_password']),
            'user_type' => 2, //1=>admin  2 =>customer
            'service_owner' => 2,//1=>service_owner  2 =>not service owner
            'is_verified' => 0,
            'messages_push_notifications' => 1,
            'otp' => $otp,

        ]);
        $details = [
            'title'=>'Email Verification Code',
            'body'=>$user->otp
        ];
        Mail::to($user->email)->send(new VerifyCodeEmail($details));
        return $user;
    }

    public function email_verification(Request $request){

        $this->validate($request,[
//            'verification_email' => ['required', 'string', 'email', 'max:255', 'exists:users,email'],
            'verification_otp' => ['required',  'max:8','exists:users,otp'],
        ]);
        $user = User::where('otp',$request->verification_otp)->first();
        if ($user->otp != $request->verification_otp){
            return redirect()->back()->with(['alert-verify-email'=> 'ال otp خطا']);
        }





        $this->guard()->login($user);
        $user->update([
            'is_verified'=>1,
            'otp'=>null
            ]);
        return redirect()->to('store/home');


    }
}
