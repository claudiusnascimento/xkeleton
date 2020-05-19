<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Models\Traits\QueryScopeTrait;

class User extends Authenticatable
{
    use Notifiable, QueryScopeTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'active'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     *  helpers functions
     */

    public function link() {
        return route('users.edit', $this->id);
    }

    /**
     *  Mutators
     */
    public function setPasswordAttribute($value)
    {
        if(\Hash::needsRehash($value))
            $this->attributes['password'] = bcrypt($value);
    }
}
