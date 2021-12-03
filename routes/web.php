<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\UserController;
use App\Models\User;

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

Route::get('/', [UserController::class, 'users'])->name('users');
Route::get('/users/{user}', function (User $user) { return view('user', compact('user')); })->name('user');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/feedback', function () { return view('feedback'); })->name('feedback');
Route::post('/feedback/save', [MainController::class, 'feedback_save']);
