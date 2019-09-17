<?php

namespace App\Http\Middleware;

use App\Menu;
use Closure;
use Illuminate\Support\Facades\Auth;

class CheckMenu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $menu)
    {
        $menu = Menu::query()
            ->where('route', $menu)
            ->first();

        if (Auth::user()->hasMenu($menu)){
            return $next($request);
        }

        return route('admin.page.dashboard');
    }
}
