<?php

namespace LeoUnglaub\LaravelBaseline\Middleware;

use Closure;
use Illuminate\Http\Request;

class HttpDisableCache
{
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
	 *
	 * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
	 */
	public function handle(Request $request, Closure $next)
	{
		// HTTP 1.0
		$request->header('Pragma', 'no-cache');

		// HTTP 1.1
		$request->header('Cache-Control', 'no-store, no-cache, max-age=-1');
		$request->header('Expires', '-1');

		return $next($request);
	}
}
