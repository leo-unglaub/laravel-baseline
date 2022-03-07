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
		/*
		 * @var \Illuminate\Http\Response
		 */
		$response = $next($request);
		$response->headers->set('Pragma', 'no-cache');
		$response->headers->set('Cache-Control', 'no-store, no-cache, max-age=-1');
		$response->headers->set('Expires', '-1');

		return $response;
	}
}
