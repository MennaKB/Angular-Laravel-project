<?php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * These middleware are run during every request to your application.
     *
<<<<<<< HEAD
     * @var array<int, class-string|string>
=======
     * @var array
>>>>>>> master
     */
    protected $middleware = [
        // \App\Http\Middleware\TrustHosts::class,
        \App\Http\Middleware\TrustProxies::class,
<<<<<<< HEAD
        \Illuminate\Http\Middleware\HandleCors::class,
=======
        \Fruitcake\Cors\HandleCors::class,
>>>>>>> master
        \App\Http\Middleware\PreventRequestsDuringMaintenance::class,
        \Illuminate\Foundation\Http\Middleware\ValidatePostSize::class,
        \App\Http\Middleware\TrimStrings::class,
        \Illuminate\Foundation\Http\Middleware\ConvertEmptyStringsToNull::class,
    ];

    /**
     * The application's route middleware groups.
     *
<<<<<<< HEAD
     * @var array<string, array<int, class-string|string>>
=======
     * @var array
>>>>>>> master
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            \Illuminate\Session\Middleware\StartSession::class,
<<<<<<< HEAD
=======
            // \Illuminate\Session\Middleware\AuthenticateSession::class,
>>>>>>> master
            \Illuminate\View\Middleware\ShareErrorsFromSession::class,
            \App\Http\Middleware\VerifyCsrfToken::class,
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],

        'api' => [
<<<<<<< HEAD
            // \Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful::class,
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
=======
            'throttle:api',
            \Illuminate\Routing\Middleware\SubstituteBindings::class,
        ],
        'admin_auth' => [
            \App\Http\Middleware\AdminAuth::class,
        ],
        'user_auth' => [
            \App\Http\Middleware\UserAuth::class,
        ],
>>>>>>> master
    ];

    /**
     * The application's route middleware.
     *
     * These middleware may be assigned to groups or used individually.
     *
<<<<<<< HEAD
     * @var array<string, class-string|string>
=======
     * @var array
>>>>>>> master
     */
    protected $routeMiddleware = [
        'auth' => \App\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
<<<<<<< HEAD
        'auth.session' => \Illuminate\Session\Middleware\AuthenticateSession::class,
=======
>>>>>>> master
        'cache.headers' => \Illuminate\Http\Middleware\SetCacheHeaders::class,
        'can' => \Illuminate\Auth\Middleware\Authorize::class,
        'guest' => \App\Http\Middleware\RedirectIfAuthenticated::class,
        'password.confirm' => \Illuminate\Auth\Middleware\RequirePassword::class,
<<<<<<< HEAD
        'signed' => \App\Http\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
=======
        'signed' => \Illuminate\Routing\Middleware\ValidateSignature::class,
        'throttle' => \Illuminate\Routing\Middleware\ThrottleRequests::class,
        'verified' => \Illuminate\Auth\Middleware\EnsureEmailIsVerified::class,
        'disable_back_btn' => \App\Http\Middleware\DisableBackBtn::class,
>>>>>>> master
    ];
}
