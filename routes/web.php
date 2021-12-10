<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/',                       function () { return view('main/index'); })->name('index');
Route::get('/about',                  function () { return view('main/about'); })->name('about');

Route::name('user.')->group(function () {
  Route::get('/users',                [UserController::class, 'users'])->name('users');
  Route::get('/user/{user}',          function (User $user) { return view('user/account', compact('user')); })->name('user');
  Route::get('/register',             function () { return (Auth::check()) ? redirect(route('user.home')) : view('user/register'); })->name('register');
  Route::post('/register',            [UserController::class, 'register']);
  Route::get('/login',                function () { return (Auth::check()) ? redirect(route('user.home')) : view('user/login'); })->name('login');
  Route::post('/login',               [UserController::class, 'login']);
  Route::get('/logout',               [UserController::class, 'logout'])->name('logout');
  Route::get('/home',                 function () { return view('user/home'); })->middleware('auth')->name('home');
});

Route::prefix('admin')->name('admin.')->middleware('is_admin')->group(function () {
  Route::get('/dashboard',            [AdminController::class, 'dashboard'])->name('dashboard');
  Route::get('/users',                [AdminController::class, 'users'])->name('users');
});

Route::name('task.')->middleware('auth')->group(function () {
  Route::get('/tasks',                [TaskController::class, 'tasks'])->name('list');
  Route::get('/task/create',          function () { return view('task/create'); })->name('create');
  Route::post('/task/create',         [TaskController::class, 'create']);
  Route::get('/task/{task}',          [TaskController::class, 'view'])->name('view');
  Route::get('/task/{task}/edit',     [TaskController::class, 'edit'])->name('edit');
  Route::post('/task/{task}/update',  [TaskController::class, 'update'])->name('update');
  Route::get('/task/{task}/remove',   [TaskController::class, 'remove'])->name('remove');
});
