<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    
    protected $primaryKey = 'id_report';
//for updating without del id or other main fields, stus 'fillable' equal update agriment
    
    protected $fillable = ['compaign_id', 'subscriber_id', 'subscriber_id'];
    
    //public function getCreatedFormatAttribute('Y-m-d H:i:s'$subscriberses)->format('Y-m-d / H:i:s');
    public static function compaign(){
        return $this->hasOne(Compaign::class, 'id_compaign', 'compaign_id');
    }
    public static function subscriber(){
        return $this->hasOne(Subscriber::class, 'id_subscriber', 'subscriber_id');

    } 
    public static function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
