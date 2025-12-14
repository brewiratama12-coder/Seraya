<?php

namespace App\Actions\Fortify;

use Laravel\Fortify\Contracts\VerifyEmailViewResponse as VerifyEmailViewResponseContract;
use Illuminate\View\View;

class VerifyEmailViewResponse implements VerifyEmailViewResponseContract
{
    /**
     * Create an HTTP response that represents the object.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\View\View
     */
    public function toResponse($request): View
    {
        return view('auth.verify-email');
    }
}
