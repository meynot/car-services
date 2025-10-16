<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckEditorPermissions
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = $request->user();
        
        // Allow admin role to access all methods
        if ($user->isAdmin()) {
            return $next($request);
        }
        
        // For guest role, only allow dashboard access
        if ($user->isGuest()) {
            $routeName = $request->route()->getName();
            if ($routeName !== 'dashboard') {
                abort(403, 'Access denied. Guest role can only view the dashboard.');
            }
        }
        
        // For user role, restrict access to only dashboard, index, and show methods
        if ($user->hasRole('user')) {
            $routeName = $request->route()->getName();
            $action = $request->route()->getActionMethod();
            
            // Allow dashboard access
            if ($routeName === 'dashboard') {
                return $next($request);
            }
            
            // Allow only index and show methods for invoices, expenses, and payments
            $allowedActions = ['index', 'show'];
            $allowedRoutes = ['invoices.index', 'invoices.show', 'expenses.index', 'expenses.show', 'invoice-payments.index', 'invoice-payments.show'];
            
            if (!in_array($action, $allowedActions) || !in_array($routeName, $allowedRoutes)) {
                abort(403, 'Access denied. User role can only view dashboard, index, and show records.');
            }
        }
        
        // For editor role, restrict access to only create, show, and index methods
        if ($user->isEditor()) {
            $action = $request->route()->getActionMethod();
            $allowedActions = ['index', 'create', 'store', 'show'];
            
            if (!in_array($action, $allowedActions)) {
                abort(403, 'Access denied. Editor role can only view, create, and show records.');
            }
        }
        
        return $next($request);
    }
}
