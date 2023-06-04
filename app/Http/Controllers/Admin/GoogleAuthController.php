<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

class GoogleAuthController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->user();

        $userExists = User::where('external_id', $user->id)->where('external_auth', 'google')->first();
        if ($userExists) {
            Auth::login($userExists);
        } else {
            $userNew = User::create([
                'names' => $user->name,
                'email' => $user->email,
                'avatar' => $user->avatar,
                'external_id' => $user->id,
                'external_auth' => 'google',
                'state_id' => '1',
            ])->assignRole('usuario');
            Auth::login($userNew);
        }
        return redirect('/redirect');
    }
}
