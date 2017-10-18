<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
    //
    protected $primaryKey = 'id_send';
  
//for updating without del id or other main fields, stus 'fillable' equal update agriment
    protected $fillable = ['subject_send', 'to_send', 'from_send', 'message_send'];//'email_count_mail' not migrate
    
    //public function getCreatedFormatAttribute('Y-m-d H:i:s'$subscriberses)->format('Y-m-d / H:i:s');
    public static function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
