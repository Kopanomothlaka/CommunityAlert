<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        // Check if the logged-in user exists in the 'admins' table
        $admin = auth()->guard('admin')->user(); // Make sure to use the 'admin' guard

        if ($admin) {
            return $next($request);  // Allow access to the route if the admin is authenticated
        }

        return redirect('home');  // Redirect if the user is not an admin

    }
}
