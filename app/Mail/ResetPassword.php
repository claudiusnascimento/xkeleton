<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

class ResetPassword extends Mailable
{
    use Queueable, SerializesModels;

    protected $user;

    public $userName;
    public $token;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;

        $this->userName = $user->name;

        $passwordReset = \DB::table('password_resets')
            ->where('email', $user->email)
            ->orderBy('created_at', 'desc')
            ->first();

        $this->token = $passwordReset->token;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('web.emails.reset-password');
    }
}
