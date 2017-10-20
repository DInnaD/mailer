<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
	use Selectable, SoftDeletes;

    protected $primaryKey = 'id_subscriber';
    protected $unsubscriber = 'unsubscriber_subscriber';
    protected $viewed = 'viewed_subscriber';
    protected $count = 'email_count_subscriber';
    protected $email = 'email_subscriber';
//for updating without del id or other main fields, stus 'fillable' equal update agriment
    protected $fillable = ['firstname_subscriber', 'lastname_subscriber', 'email_subscriber', 'viewed_subscriber', 'unsubscriber_subscriber', 'email_count_subscriber'];//'email_count_mail' not migrate
    
          
    //public function getCreatedFormatAttribute('Y-m-d H:i:s'$subscriberses)->format('Y-m-d / H:i:s');
  
    public function user(){
		return $this->hasMany(User::class);
	}
///////////////////////////////////////////
    public function bunch(){
 		return $this->belongsTo(Bunch::class, 'id', 'bunch_id');
	}
	 public function report(){
 		return $this->belongsTo(Report::class);
	}
	 public function send(){
 		return $this->belongsTo(Send::class);
	}
}
