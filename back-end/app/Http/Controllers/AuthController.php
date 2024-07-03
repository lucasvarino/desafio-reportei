<?php

namespace App\Http\Controllers;

use App\Http\Clients\GithubApiClient;
use Illuminate\Support\Facades\Cookie;
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
                'username' => $githubUser->nickname,
                'email' => $githubUser->email,
                'avatar' => $githubUser->avatar,
                'github_token' => $githubUser->token,
                'github_refresh_token' => $githubUser->refreshToken,
            ]
        );
        Auth::login($user);

        $token = $user->createToken('authToken')->plainTextToken;

        return response()->json(['user' => $user, 'token' => $token], 200)
            ->cookie('auth_token', $token, 60 * 24, null, null, true, true);
    }

    public function logout()
    {
        $cookie = Cookie::forget('auth_token');
        return response()->json(['message' => 'Logged out'], 200)->withCookie($cookie);
    }
}
