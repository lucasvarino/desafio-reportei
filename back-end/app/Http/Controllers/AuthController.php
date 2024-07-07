<?php

namespace App\Http\Controllers;

use App\Http\Clients\GithubApiClient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

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
                'username' => $githubUser->nickname,
                'email' => $githubUser->email,
                'avatar' => $githubUser->avatar,
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken || 'a',
            ]
        );

        Auth::login($user);

        $token = JWTAuth::fromUser($user);

        return response()->json(['token' => $token], 200);
    }

    public function logout()
    {
        $cookie = Cookie::forget('auth_token');
        return response()->json(['message' => 'Logged out'], 200)->withCookie($cookie);
    }
}
