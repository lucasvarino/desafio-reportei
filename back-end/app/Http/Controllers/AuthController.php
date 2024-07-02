<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function redirectToGithub()
    {
        return Socialite::driver('github')->stateless()->redirect();
    }

    public function handleGithubCallback()
    {
        $githubUser = Socialite::driver('github')->stateless()->user();
        $user = User::updateOrCreate(
            [
                'github_id' => $githubUser->id
            ],
            [
                'name' => $githubUser->name,
                'email' => $githubUser->email,
                'avatar' => $githubUser->avatar,
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken,
            ]
        );

        Auth::login($user);

        // Retorne um token JWT ou um token de sessão
        $token = $user->createToken('authToken')->accessToken;

        return response()->json(['token' => $token]);
    }
}
