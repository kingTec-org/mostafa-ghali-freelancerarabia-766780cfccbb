<?php

namespace App\Http\Controllers\Web\SocialAuth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider){
        return Socialite::driver($provider)->redirect();

    }

    public function SocialAuth($provider){


            $user = Socialite::driver($provider)->user();
            $finduser = User::where('social_provider_id', $user->id)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect('store/home');
            }else{
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'social_provider_id'=> $user->id,
                    'social_provider'=> $provider,
                    'password' => encrypt('my-google')
                ]);
                Auth::login($newUser);
                return redirect('store/home');
            }
//        } catch (\Exception $e) {
//            dd($e);
//        }
//        $social_user = Socialite::driver($provider)->user();
//        dd($social_user);
//        $user = User::findOrCreateBySocial($social_user, $provider);
//
//        return redirect()->to('store/home');

    }
}
