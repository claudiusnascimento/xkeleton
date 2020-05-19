<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Events\ResetPassword;

use App\Http\Requests\Web\ResetPassword as ResetPasswordRequest;

class PasswordController extends Controller
{
    public function index()
    {

        return view('web.password.reset');
    }

    public function reset(Request $request)
    {
        $user = \App\Models\User::where('email', $request->get('email'))->get();

        if($user->count() != 1) {

            // TODO
            // if has email duplicates (count > 1)
            // send, with infos (users), a event to correct this

            return redirect()->back()->withErrors('E-mail não existe ou usuário está inativo', 'reset');
        }

        $user = $user->first();

        \DB::table('password_resets')->insert(
            [
                'email' => $user->email,
                'token' => \Str::random(40)
            ]
        );

        // TODO
        // log to reset passoword

        // evento pra enviar email
        event(new ResetPassword($user));

        message('Acesse seu e-mail para recuperar a senha', 'alert');

        return redirect()->back();
    }

    public function new($token)
    {
        $passwordReset = $this->getPasswordReset($token);

        abort_if(!$passwordReset, 404);

        return view('web.password.new-password', compact('token'));
    }

    public function storeNew(ResetPasswordRequest $request)
    {
        if(!$request->filled('reset_token')) {
            return redirect()->bach()->withErrors('Token não encontrado', 'reset');
        }

        $passwordReset = $this->getPasswordReset($request->get('reset_token'));

        if(!$passwordReset) {
            return redirect()->bach()->withErrors('Recuperação de senha expirou', 'reset');
        }

        $user = \App\Models\User::where('email', $passwordReset->email)->get();

        if($user->count() != 1) {

            // TODO
            // if has email duplicates (count > 1)
            // send, with infos (users), a event to correct this

            return redirect()->back()->withErrors('E-mail não existe ou usuário está inativo', 'reset');
        }

        $user = $user->first();

        // TODO
        // Talvez deletar da password_resets o model encontrado

        $user->password = $request->get('password');
        $user->save();

        message('Senha resetada com sucesso!', 'alert');

        return redirect()->route('web.login.index');
    }

    private function getPasswordReset($token)
    {
        return \DB::table('password_resets')
            ->where('token', $token)
            ->where('created_at', '>=', hoursAgo(config('auth.password_reset_timeout', 24)))
            ->first();
    }
}
