<?php

use App\Http\Middleware\RedirectIfPaid;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::view('/dashboard', 'dashboard')->name('dashboard');

    Route::view('/subscribe', 'subscribe')
        ->middleware(RedirectIfPaid::class)
        ->name('subscribe');

    Route::view('/members', 'members')
        ->middleware('subscriptions.active')
        ->name('members.index');

    Route::view('/charge', 'charge')
        ->name('charge');
});
