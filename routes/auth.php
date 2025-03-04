<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\PasswordResetLinkController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Auth\AuthenticationController;
use App\Http\Controllers\MailController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function() {
    Route::middleware('guest')->group(function () {
        Route::get('register', [AuthenticationController::class, 'registerCreate'])
            ->name('register');

        Route::post('register', [AuthenticationController::class, 'registerStore']);

        Route::get('login', [AuthenticatedSessionController::class, 'create'])
            ->name('login');

        Route::post('login', [AuthenticatedSessionController::class, 'store']);

        Route::get('forgot-password', [AuthenticationController::class, 'PasswordResetCreate'])
            ->name('forgot_password');

        Route::get('forgot-password/retrieve/{password_reset_code}', [MailController::class, 'passwordResetCallback']);

        Route::post('forgot-password', [MailController::class, 'sendPasswordResetMail'])
            ->name('forgot_password');

        Route::post('forgot-password/save', [MailController::class, 'passwordResetCallbackSave']);

        Route::get('/zones/{region_id}',[AuthenticationController::class, 'zonelist']);
        Route::get('/woredas/{zone_id}', [AuthenticationController::class,'woredalist']);
        Route::get('/schools/{woreda_id}', [AuthenticationController::class, 'schoolist']);
        //Social Login
        Route::get('/github/redirect', function () { return Socialite::driver('github')->redirect(); })->name('login.github');
        Route::get('/google/redirect', function () { return Socialite::driver('google')->redirect(); })->name('login.google');
        Route::get('/twitter/redirect', function () { return Socialite::driver('twitter')->redirect(); })->name('login.twitter');
        Route::get('/facebook/redirect', function () { return Socialite::driver('facebook')->redirect(); })->name('login.facebook');

        Route::get('/github/callback', [AuthenticationController::class, 'githubCallback']);
        Route::get('/google/callback', [AuthenticationController::class, 'googleCallback']);
        Route::get('/twitter/callback', [AuthenticationController::class, 'twitterCallback']);
        Route::get('/facebook/callback', [AuthenticationController::class, 'facebookCallback']);    

    });

    Route::middleware('auth')->group(function () {

        Route::put('password', [PasswordController::class, 'update'])->name('password.update');

        Route::post('logout', [AuthenticatedSessionController::class, 'destroy'])
            ->name('logout');
    });
});


if (file_exists(base_path('routes/custom_routes_auth.php'))) {
    include base_path('routes/custom_routes_auth.php');
}