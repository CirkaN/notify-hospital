<?php

namespace App\Http\Middleware;

use Closure;
use DB;
class IsFirstLogin
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
        
        $doctor = DB::table('doctors')
                ->where('token',$request->token)
                ->first();
                
        if($doctor->password){
            return redirect('login');
        }
       

        return $next($request);
    }
}
