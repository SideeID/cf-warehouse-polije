<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user = Socialite::driver('google')->user();

            $findUsser = User::where('email', $user->email)->first();

            if ($findUsser) {
                Auth::login($findUsser);
                return redirect()->intended('/');
            } else {
                $newUser = User::create([
                    // 'id_user' => $user->id,
                    'email'=> $user->email,
                    'id_level' => 2,
                ]);
                Auth::login($newUser);
                return redirect()->intended('/');
            }
        } catch (Exception $e) {
            dd($e->getMessage());   
        }
    }

}