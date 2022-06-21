<?php

namespace App\Http\Middleware;

use Closure;
use Auth; 
class User
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

        if(empty($_SESSION['user'])){
         
           $username ='islam.gulshan@gmail.com';

          $login_type = filter_var($username, FILTER_VALIDATE_EMAIL ) 
        ? 'email' 
        : 'username';
          $credentials = $request->only($login_type);
        $request->password = 'pass1234';
       if (Auth::attempt(['name' => 'guls', 'password' =>'pass1234'])) {
            //Session::get('user', 'sa');

           $_SESSION['user']=1;
           return $next($request);
        }
        }else{
             return $next($request);

        }
         
         

          
    }
}
