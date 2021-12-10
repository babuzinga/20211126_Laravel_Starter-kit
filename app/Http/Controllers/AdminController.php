<?php

namespace App\Http\Controllers;

use App\Models\User;

class AdminController extends Controller
{
  public function __construct()
  {

  }

  public function dashboard()
  {
    echo 1;
  }

  public function users()
  {
    $users = User::orderBy('created_at')->paginate(10);
    return view('admin/users', compact('users'));
  }
}
