<?php

use Laravel\Socialite\SocialiteServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    SocialiteServiceProvider::class,
    Tymon\JWTAuth\Providers\LaravelServiceProvider::class,
];
