<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
    protected $primaryKey = 'id_subscriber';
    use SoftDeletes;
//for updating without del id or other main fields, stus 'fillable' equal update agriment
    protected $fillable = ['firstname_subscriber', 'lastname_subscriber', 'email_subscriber'];//'email_count_mail' not migrate
    
    //public function getCreatedFormatAttribute('Y-m-d H:i:s'$subscriberses)->format('Y-m-d / H:i:s');
  
    public function user(){
		return $this->hasMany(User::class);
	}
///////////////////////////////////////////
    public function bunch(){
 		return $this->belongsTo(Bunch::class);
	}
	 public function report(){
 		return $this->belongsTo(Report::class);
	}
	 public function send(){
 		return $this->belongsTo(Send::class);
	}
}
