<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
  //
  public function index()
  {
    $users = User::orderBy('id')->paginate(10);
    return view('main', compact('users'));
  }
}
