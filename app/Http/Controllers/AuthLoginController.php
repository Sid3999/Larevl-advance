<?php

namespace App\Http\Controllers;

use Auth;
use Socialite;
use Exception;
use App\Models\User;
use Illuminate\Http\Request;

class AuthLoginController extends Controller
{
    //
    public function redirectToGoogle()

    {

        return Socialite::driver('google')->redirect();

    }
    public function handleGoogleCallback()

    {

        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('google_id', $user->id)->first();

            if($finduser){

                Auth::login($finduser);

               dd('yes');

            }else{

                $newUser = User::create([

                    'name' => $user->name,

                    'email' => $user->email,

                    'google_id'=> $user->id

                ]);

                Auth::login($newUser);

                return redirect()->back();

            }

        } catch (Exception $e) {

            return redirect('auth/google');

        }

    }
}
