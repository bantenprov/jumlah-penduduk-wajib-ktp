<?php namespace Bantenprov\JPWajibKTP\Http\Middleware;

use Closure;

/**
 * The JPWajibKTPMiddleware class.
 *
 * @package Bantenprov\JPWajibKTP
 * @author  bantenprov <developer.bantenprov@gmail.com>
 */
class JPWajibKTPMiddleware
{

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
