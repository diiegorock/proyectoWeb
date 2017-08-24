<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
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
     *
     * Boot the model.
     *
     */

    public static function boot()
    {
        parent::boot();

        static::creating(function ($user) {
            $user->token = str_random(40);
        }); 
    }

    /**
     * Confirm the user.
     *
     * @return void
     */
    public function confirmEmail()
    {
        $this->verified = true;
        $this->token = null;

        $this->save();
    }

    public function getPermisos(){
        switch ($this->role) {
            case 1:
                return 'Administrador';
                break;
            case 2:
                return 'Propietario';
                break;
            case 3:
                return 'Personal';
                break;
        }
    }
}
