<?php

namespace App\Http\Controllers\AuthAPI;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\Sanctum\PersonalAccessToken;

class LoginController extends Controller
{
    public function userlist()
    {
        $user =  User::all();
        $response = compact('user');
        return response($response, 200);
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
        //   'passwordConfirmation' => 'required|same:password|required_with:password',
        ]);

        $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
        ]);

        $token = $user->createToken('MyToken')->plainTextToken;

        $response = compact('user', 'token');

        return response($response, 200);

    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);
        $user = User::where('email', $request['email'])->first();
        if (empty($user)) {
            $status = 'User Not Found';
            return response(['message' => [$status], 200]);
        }else{
            if (Hash::check($request['password'], $user->password)) {
                $token = $user->createToken('MyAuthApp')->plainTextToken;
                $response = [
                    'user' => $user,
                    'token' => $token,
                ];
                return response($response, 200);
            }else{
                $status = "Password Did Not Match";
                return response(['message' => [$status], 200]);

            }
        }
    }

    public function socialLogin(Request $request)
    {

        $request->validate([
            'socialID' => 'required',
            'socialProvider' => 'required',
        ]);

        if (empty($request['password'])) {
            $password = rand();
        }else{
            $password = $request['password'];
        }
        if (empty($request['name'])) {
            $name = "user" . rand(1000, 9999);
        }else{
            $name = $request['name'];
        }
 	if (empty($request['email'])) {
            $email = $request['socialID'];
        }else{
            $email = $request['email'];
        }

        $checkSocialID = USER::where('social_provider_id', $request['socialID'])->first(['id']);
        if (empty($checkSocialID)) {
            $data = User::create([
                'name' => $name,
                'email' => $email,                'password' => Hash::make($password),
                'social_provider_id' => $request['socialID'],
                'social_provider' => $request['socialProvider'],
            ]);
            $user = USER::where('id', $data->id)->first();
            $token = $user->createToken('MyToken')->plainTextToken;

            $response = compact('user', 'token');

            return response($response, 200);
        }else{

            $user = User::where('id', $checkSocialID->id)->first();

            $token = $user->createToken('MyToken')->plainTextToken;

            $response = compact('user', 'token');

            return response($response, 200);
        }
    }

}
