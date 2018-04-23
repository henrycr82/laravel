<?php

namespace App;

use App\Notifications\ResetPassword;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'dni'
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
     * Send the password reset notification.
     *
     * @param  string  $token
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        /*
        Usaremos la clase que copiamos de 
        laravel\vendor\laravel\framework\src\Iluminate\Auth\Notificaions\ResetPassword.php

        La clase copiada (ResetPassword) la pegamos en un fichero llamado ResetPassword.php que creamos en la carpeta app/Notifications
        */

        //$this->notify(new ResetPasswordNotification($token));
        $this->notify(new ResetPassword($token));
    }
}
