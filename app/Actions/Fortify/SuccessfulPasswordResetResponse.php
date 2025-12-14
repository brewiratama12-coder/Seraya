<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\SuccessfulPasswordResetResponse as SuccessfulPasswordResetResponseContract;

class SuccessfulPasswordResetResponse implements SuccessfulPasswordResetResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $status
     * @return \Illuminate\Http\RedirectResponse
     */
    public function toResponse($request, $status = null)
    {
        return redirect()->route('login')->with('status', $status ?: __('Password reset successfully.'));
    }
}
