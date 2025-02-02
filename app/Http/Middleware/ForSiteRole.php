<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class ForSiteRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        /**
         * @var App\Models\User;
         */
        $user = Auth::user();
        if ($user && !$user->hasAnyRole(['dean', 'superadmin', 'site secretary'])) {
            abort(403, "Unauthorized access blocked.");
        }

        return $next($request);
    }
}
