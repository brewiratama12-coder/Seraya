<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\LoginResponse as LoginResponseContract;

class LoginResponse implements LoginResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     */
    public function toResponse($request)
    {
        $user = $request->user();

        // Admin users go to admin dashboard, others stay on current page/intended
        if ($user && isset($user->role) && $user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        // Default: redirect to intended page or home
        return redirect()->intended('/');
    }
}
