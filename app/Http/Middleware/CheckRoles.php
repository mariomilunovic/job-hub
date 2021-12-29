<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckRoles
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$permitted_roles)
    {
        if($request->user() === null)
        {
            return redirect('login')->with('error','Niste ulogovani');

        }

        if($request->user()->hasAnyRoles($permitted_roles) || !$permitted_roles)
        {
            return $next($request);
        }
        return redirect()->back()->with('error','Nemate dozvolu za pristup');


        return $next($request);
    }
}
