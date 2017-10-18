<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    //protected $primaryKey = 'id_user';
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

    // relatons
    public static function temlate(){
        return $this->hasOne(Template::class, 'id_template', 'temlate_id');
    }
     public static function compaign(){
        return $this->hasOne(Compaign::class, 'id_compaign', 'compaign_id');
    }
    public static function subscribers(){
        return $this->hasOne(Subscriber::class, 'id_subscriber', 'subscriber_id');

    }
    public static function bunch(){
        return $this->hasOne(Bunch::class, 'id_bunch', 'bunch_id');
    }
    public static function sends(){
        return $this->hasOne(Send::class, 'id_send', 'send_id');
    }
    //report withiot
}
