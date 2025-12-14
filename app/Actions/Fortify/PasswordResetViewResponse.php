<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\PasswordResetViewResponse as PasswordResetViewResponseContract;
use Illuminate\View\View;

class PasswordResetViewResponse implements PasswordResetViewResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function toResponse($request): View
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
        ]);

        return view('auth.reset-password', [
            'email' => $request->email,
            'token' => $request->token,
        ]);
    }
}
