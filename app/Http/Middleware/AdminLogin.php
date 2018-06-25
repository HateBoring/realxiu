<?php
namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
class AdminLogin{

    public function handle($request, Closure $next){
        if(!session('user')){
            return redirect('Admin/login');
        }
        return $next($request);
    }
}