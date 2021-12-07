<?php

namespace App\Http\Controllers;

class MainController extends Controller
{
  public function settings()
  {
    $this->authorize('is_admin_project');

    echo 'settings';
  }
}
