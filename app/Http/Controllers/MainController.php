<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class MainController extends Controller
{
  //
  public function feedback(Request $request)
  {
    $validated = $request->validate([
      'email'   => 'required|min:4|max:100|email',
      'message' => 'required|min:20|',
    ]);

    $feedback = new Feedback();
    $feedback->email = $request->input('email');
    $feedback->message = $request->input('message');

    $feedback->save();
    return redirect()->route('feedback');
  }
}
