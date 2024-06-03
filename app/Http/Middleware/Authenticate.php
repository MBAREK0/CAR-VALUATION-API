<?php
namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        // Return null since we're handling the response directly
        return null;
    }

    /**
     * Handle an unauthorized user.
     */
    protected function unauthenticated($request, array $guards)
    {
        // Check if the request expects a JSON response
        if ($request->expectsJson()) {
            // Return a JSON response with an unauthorized status code
            abort(response()->json(['error' => 'Unauthorized'], 401));
        }

        // Fallback to the default behavior
        parent::unauthenticated($request, $guards);
    }
}
