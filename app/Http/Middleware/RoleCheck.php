<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleCheck
{
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Get authenticated user from Sanctum
        $user = Auth::guard('sanctum')->user();
    
        // Check if user is authenticated
        if (!$user) {
            return response()->json([
                'message' => 'Unauthorized',
                'error' => 'No authenticated user found'
            ], Response::HTTP_UNAUTHORIZED);
        }
    
        // Get user's role
        $userRole = $user->role->role;
    
        // Check if user has required role
        if (!in_array($userRole, $roles)) {
            return response()->json([
                'message' => 'Forbidden',
                'error' => 'User does not have the required role',
                'required_roles' => $roles,
                'user_role' => $userRole
            ], Response::HTTP_FORBIDDEN);
        }
    
        // Add role to request for use in controllers
        $request->attributes->add(['user_role' => $userRole]);
    
        return $next($request);
    }

    // /**
    //  * Handle an incoming request.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  \Closure  $next
    //  * @param  string[]  ...$roles
    //  * @return \Symfony\Component\HttpFoundation\Response
    //  */

    // public function handle(Request $request, Closure $next, ...$roles): Response
    // {
    //     $user = Auth::guard('sanctum')->user();
    
    //     if (!$user) {
    //         return response()->json(['message' => 'Unauthorized'], Response::HTTP_UNAUTHORIZED);
    //     }
    
    //     if (!in_array($user->role->role, $roles)) {
    //         return response()->json(['message' => 'Forbidden'], Response::HTTP_FORBIDDEN);
    //     }
    
    //     return $next($request);
    // }
    
    
    // public function handle(Request $request, Closure $next, ...$roles): Response
    // {
    //     if (!Auth::guard('sanctum')->check()) {
    //         return response()->json(['message' => 'Forbidden'], Response::HTTP_FORBIDDEN);
    //     }
    
    //     $user = Auth::guard('sanctum')->user();
    //     $userRole = $user->role->role;
    
    //     if (in_array($userRole, $roles)) {
    //         return $next($request);
    //     }
    
    //     return response()->json(['message' => 'Forbidden'], Response::HTTP_FORBIDDEN);
    // }
     

    // public function handle(Request $request, Closure $next, ...$roles): Response
    // {
        
    //     if (Auth::check()) {
            
    //         $userRole = Auth::user()->role->role;
            
    //         if (in_array($userRole, $roles)) {
    //             return $next($request);
    //         }
    //     }
    
    //     Auth::logout();
    //     return redirect()->route('login')->with('status', 'You are not authorized to access this page.');
    // }
}

