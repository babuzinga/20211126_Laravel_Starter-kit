<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class isAdminMiddleware
{
  /**
   * Обработка входящего запроса
   *
   * @param Request $request
   * @param Closure $next
   * @return mixed
   */
  public function handle(Request $request, Closure $next)
  {
    if (!auth()->check() || !auth()->user()->isAdmin()) {
      abort(403);
    }

    return $next($request);
  }
}
