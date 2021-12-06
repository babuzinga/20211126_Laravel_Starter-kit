<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


class UserController extends Controller
{
  //
  public function users()
  {
    $users = User::orderBy('created_at')->paginate(10);
    return view('user/users', compact('users'));
  }

  /**
   * Авторизация
   * https://laravel.su/docs/8.x/authentication
   * https://laravel.com/docs/8.x/authentication
   *
   * @param Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function login(Request $request)
  {
    $credentials = $request->validate([
      'email'     => ['required', 'email'],
      'password'  => ['required'],
    ]);

    if (Auth::attempt($credentials)) {
      $request->session()->regenerate();

      return redirect()->intended('/');
    }

    return back()
      ->withErrors(['email' => 'The provided credentials do not match our records.'])
      ->withInput(['email' => $credentials['email']])
    ;
  }

  /**
   * @param Request $request
   * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
   */
  public function logout(Request $request)
  {
    Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
  }

  /**
   * Регистрация нового пользователя
   * @param Request $request
   * @return \Illuminate\Http\RedirectResponse
   */
  public function register(Request $request)
  {
    $validated = $request->validate([
      'email'     => 'required|min:4|max:100|email|unique:users',
      'password'  => 'required|min:8|max:100|confirmed',
    ]);

    // https://laravel.com/docs/8.x/hashing
    // https://laravel.com/docs/8.x/validation

    $user = new User();
    $user->id = Str::uuid();
    $user->name = 'User';
    $user->email = $request->email;
    $user->password = $request->password;

    $user->save();
    return redirect()->route('user.login');
  }
}
