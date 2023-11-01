<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('login', [AuthController::class, 'login'])->name('auth.login');
Route::get('logout', [AuthController::class, 'logout'])->name('auth.logout');
Route::post('login-user', [AuthController::class, 'loginUser'])->name('auth.loginUser');
Route::get('register', [AuthController::class, 'registerPage'])->name('auth.register');
Route::post('registerUser', [AuthController::class, 'registerUser'])->name('auth.registerUser');
Route::get('google/login', [AuthController::class, 'googleProvider'])->name('google.login');
Route::get('google/callback', [AuthController::class, 'googleCallbackHandler'])->name('google.callback');
Route::get('facebook/login', [AuthController::class, 'facebookProvider'])->name('facebook.login');
Route::get('facebook/callback', [AuthController::class, 'facebookCallbackHandler'])->name('facebook.callback');

Route::middleware(['auth'])->group(function () {
	Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
	Route::resource('users', UserController::class);
	Route::get('/profile', [UserController::class, 'profile'])->name('profile');
	Route::put('/profileUpdate/{id}', [UserController::class, 'profileUpdate'])->name('profileUpdate');
});