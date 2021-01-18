<?php

namespace App\Http\Middleware;

use App\User;
use Closure;

class AdminCheck
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
        if(User::with(['role'])->where('id',auth()->user()->id)->role->id !== 1){
            return redirect()->back();
        }

        return $next($request);
    }
}
