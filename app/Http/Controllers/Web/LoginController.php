<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Http\Requests\Web\LoginRequest;

class LoginController extends Controller
{
    public function index() {

        if(\Auth::check()) {
            return redirect()->route('admin.dashboard');
        }

        return view('web.login.index');
    }

    public function login(LoginRequest $request) {

        $credentials = $request->only('email', 'password');
        $credentials['active'] = true;

        if (\Auth::attempt($credentials)) {

            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()
                ->back()
                ->withInput($request->only('email'))
                ->withErrors('Usuário inexistente ou inativo ou senha errada', 'login');
    }
}
