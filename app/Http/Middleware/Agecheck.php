<?php

namespace App\Http\Middleware;

use Closure;

class Agecheck
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
        // $age = $request->get('agec');
        // if($age >= 18)
        // {
        // }
        //     return redirect('/login')->with('msg','Not valid age');

        if(!session()->has('record'))
        {
            return redirect('/login');
        }
        return $next($request);
    }
}
