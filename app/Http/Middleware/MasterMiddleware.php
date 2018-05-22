<?php

namespace App\Http\Middleware;

use App\Article;
use Closure;
use Illuminate\Contracts\Auth\Guard;

class MasterMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $auth;

    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    public function handle($request, Closure $next)
    {
        if ($this->auth->getUser()->role !== "master") {
            //abort(403, 'Unauthorized action.');
            //return response()->"You are not master!";
            return redirect('/main');
        }

        return $next($request);
    }


}
