<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  mixed ...$roles
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Ha a felhasználó nincs bejelentkezve → login oldal
        if (!Auth::check()) {
            return redirect('/login');
        }

        // Ha nincs megfelelő role → 403 hiba
        if (!in_array(Auth::user()->role, $roles)) {
            abort(403, 'Nincs jogosultságod hozzáférni ehhez az oldalhoz.');
        }

        return $next($request);
    }
}
