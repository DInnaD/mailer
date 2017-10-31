<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscriber extends Model
{
	use Selectable, SoftDeletes, Owned;

    protected $primaryKey = 'id_subscriber';
    //protected $unsubscriber = 'unsubscriber_subscriber';
    //protected $viewed = 'viewed_subscriber';
    //protected $count = 'email_count_subscriber';
    //protected $email = 'email_subscriber';

    protected $fillable = ['firstname_subscriber', 'lastname_subscriber', 'email_subscriber', 'report_id', 'created_by'];//'email_count_mail' not migrate
    
          
    //public function getCreatedFormatAttribute('Y-m-d H:i:s'$subscriberses)->format('Y-m-d / H:i:s');
  
    public function user(){
		return $this->hasOne(User::class);
	}//d
    public function preview(){
            return $this->hasOne(Subscriber::class, 'subscriber_id', 'id_subscriber');
    }//d
    ////////////////////////////////////////////////
    public function bunches(){//es i zacreatelo!!!!!!!!! why not bunch??????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????????
        return $this->belongsTo(Bunch::class, 'bunch_id', 'id_bunch');
    }//r    
    public function report(){  
        return $this->belongsTo(Report::class, 'report_id', 'id_report');
    }//d
     
    //  public function send(){
 //         return $this->belongsTo(Send::class);
    // }
   ///////////////////////////////////////////

    // ce virno?????????public function bunch(){
 //         return $this->belongsTo('App\Bunch');
    // }
	 // Polymorphic relation with bunches
    // public function bunch()
    // {
    //   return $this->morphToOne('App\Bunch', 'banchable');
    // }
}
