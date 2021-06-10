<?php
namespace app\Http\Middleware;
use Closure;
use Redirect;
use Request;
use Sentinel;
class SentinelAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
            if(!Sentinel::check())
                return Redirect::to('main_admin/signin')->with('error', 'You must be logged in!');
            return $next($request);
    }
}