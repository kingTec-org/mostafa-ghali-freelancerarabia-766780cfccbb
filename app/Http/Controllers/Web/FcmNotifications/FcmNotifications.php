<?php

namespace App\Http\Controllers\Web\FcmNotifications;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FcmNotifications extends Controller
{
    public function StoreToken(Request $request){
        $user_admin = auth('web')->user();
        $user_admin->device_key = $request->token;
        $user_admin->update();
        return response()->json(['status'=>true]);
    }
}
