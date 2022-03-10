<?php

namespace App\Http\Controllers\AuthAPI;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class ForgetPassController extends Controller
{
    public function forgetPassword(Request $request){
        $request->validate([
            'email' => 'required|exists:users,email',
        ]);

        $otp = random_int(100000000, 999999999);

          DB::table('password_resets')->insert([
            'email' => $request['email'],
            'token' => $otp,
            'created_at' => now(),
        ]);

        $user = DB::table('users')->where('email', $request['email'])->first(['id']);

        $user->otp = $otp;
        // Mail::send(['OTP' => $otp],['otp' => $otp], function ($message) use($request) {
        //     $message->to($request['email']);
        //     $message->subject('Password Reset');
        // });

        $data = compact('user');

        return response($data, 200);

    }

    public function resetPassword(Request $request){
        $request->validate([
            'userID' => 'required|exists:users,id',
            'password' => 'required',
            'passwordConfirmation' => 'required|required_with:password|same:password',
        ]);

       DB::table('users')->where('id', $request['userID'])->update([
           'password' => Hash::make($request['password']),
       ]);
       DB::table('password_resets')->where('email', $request['email'])->delete();

       return response(['message' => 'Password Reset Successfully'], 200);



    }
}
