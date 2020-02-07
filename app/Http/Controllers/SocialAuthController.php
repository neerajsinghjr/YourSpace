<?php

namespace App\Http\Controllers;

use Auth;
use App\User;
use Socialite;
use Illuminate\Http\Request;

class SocialAuthController extends Controller
{
    


    public function auth($provider) {

    	return Socialite::driver($provider)->redirect();

    }


    public function authCallback($provider) {

    	// dd("callback");

    	$user = new User();	

    	$response = Socialite::driver($provider)->user();

    	// dd($response);

    	$user = User::where('email', $response->email)->first();

    	if($user) {

    		Auth::login($user);
    		return redirect()->route('home');

    	}else {

    		$user = new User;
    		$user->name = $response->name;
    		$user->email = $response->email;
    		$user->avatar = $response->avatar;
    		$user->provider = $provider;
    		$user->provider_id = $response->id;
    		$user->token = $response->token;
    		$user->save();
    		Auth::login($user);
    		return redirect()->route('home');
    	}

    }

}

