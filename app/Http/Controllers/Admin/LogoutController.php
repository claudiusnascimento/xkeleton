<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LogoutController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        if(\Auth::check())
            \Auth::logout();

        return redirect()->route(env('REDIRECT_AFTER_LOGOUT', 'web.login.index'));
    }
}
