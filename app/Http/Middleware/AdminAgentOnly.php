<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminAgentOnly
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \Closure  $next
	 * @return mixed
	 */
	public function handle(Request $request, Closure $next)
	{
		$roles = ['admin', 'agent'];
		if (in_array(Auth::user()->role, $roles)) {
			return $next($request);
		}
		return redirect(route('pages.index'));
	}
}
