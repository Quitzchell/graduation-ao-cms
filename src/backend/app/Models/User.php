<?php

declare(strict_types=1);

namespace App\Models;

use AO\Auth\TwoFactorAuthentication\Interfaces\TwoFactorAuthenticatable as TwoFactorAuthenticatableContract;
use AO\Auth\TwoFactorAuthentication\Models\Traits\TwoFactorAuthenticatable;
use Illuminate\Auth\MustVerifyEmail;
use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends \Eloquent implements
    AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract,
    TwoFactorAuthenticatableContract
{
    use Authenticatable;
    use Authorizable;
    use CanResetPassword;
    use HasApiTokens;
    use HasFactory;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'username',
        'fullname',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /*
     * Overwrite sendPasswordResetNotification for backwards compatibility
     */

    public function sendPasswordResetNotification($token)
    {
        $html = view('emails.password', ['token' => $token])->render();

        \Mail::send([], [], function (\Illuminate\Mail\Message $message) use ($html) {
            $message
                ->to($this->email)
                ->subject('Password reset')
                ->html($html);
        });
    }

    public static function validatorAddRules()
    {
        return array(
            'username' => 'required|unique:users',
            'password' => 'required|min:8',
            'fullname' => 'required',
            'email' => 'required|email|unique:users'
        );
    }

    public function validatorEditRules()
    {
        return array(
            'username' => 'required',
            'fullname' => 'required',
            'email' => "required|email|unique:$this->table,email,$this->id"
        );
    }

    public static function validatorMessages()
    {
        return array(
            'username.required' => 'U dient een gebruikersnaam in te voeren.',
            'username.unique' => 'Deze gebruikersnaam is al in gebruik.',
            'password.required' => 'U dient een wachtwoord in te voeren.',
            'password.min' => 'Uw wachtwoord moet minstens :min characters lang te zijn.',
            'fullname.required' => 'U dient uw volledige naam in te voeren.',
            'email.required' => 'U dient uw e-mail adres in te voeren.',
            'email.email' => 'U dient een e-mail adres in te voeren.',
            'email.unique' => 'Dit e-mail adres is al in gebruik op een account.',
        );
    }

}
