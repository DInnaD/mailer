<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compaign extends Model
{
    //
   
//for updating without del id or other main fields, stus 'fillable' equal update agriment
   

    use Selectable, SoftDeletes;//, Avaliable {

    //     boot as bootOwnedEvents;
    // }
    
    

    protected $primaryKey = 'id_compaign';
    protected $name = 'name_compaign';
    protected $status = 'status_compaign';

    protected $attributes = [
        'status' => 10
    ];
    // public function getOwnedFields(){

    //     return 'user_id','created_by';
    // }
    // public static function boot(){

    //     parent::boot();
    //     self::bootOwenedEvents();
    //     parent::observe(new CampaignsObserver());
    // }
    
    protected $fillable = ['name_compaign', 'template_id', 'bunch_id', 'description_compaign'];
   

    

	public function temlate(){
		return $this->hasOne(Temlate::class);
	}
	public function bunch(){
		return $this->hasOne(Bunch::class);
	}	
	public function user(){
		return $this->hasOne(User::class);
	}
	/////////////////////////////////////////////////////
	public function send(){
 			return $this->belongsTo(Send::class);
	}
	 public function report(){
 		return $this->belongsTo(Report::class);
	}

	public function getSubscribersList(){
		$mail_subscriber = array_column($this->bunch->subscribers, 'mail_subscriber');
        return implode(', ', $mail_subscriber);
	}
}
