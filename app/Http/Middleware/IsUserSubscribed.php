<?php

namespace App\Http\Middleware;

use Closure;

class IsUserSubscribed
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
        if ($request->user() && ! $request->user()->subscribed('fidelicious')) {
            // This user is not a paying customer...
            return redirect('/notsubscribed');
        }

        return $next($request);
    }
}
