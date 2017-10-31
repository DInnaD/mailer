<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    //
    use Selectable, Owned;
    protected $primaryKey = 'id_report';
    //protected $name = 'viewed'.............;
    protected $fillable = ['subject', 'to', 'from', 'message', 'sent', 'viewed', 'unsubscriber', 'because', 'failed', 'created_by'];

    public function user(){
		return $this->hasOne(User::class);
	}//d
    public function compaign(){
		return $this->hasOne(Compaign::class, 'report_id', 'id_report');
	}//d	
	public function subscribers(){
		return $this->hasMany(Subscriber::class, 'report_id', 'id_report');
	}//d	
	///////////////////////////////////////////////////api
	// public function preview(){
 // 		return $this->belongsTo(Preview::class, 'preview_id', 'id_preview');
	// }
	//public function getCreatedFormatAttribute('Y-m-d H:i:s'$subscriberses)->format('Y-m-d / H:i:s');
	// public function compaign(){
 // 		return $this->belongsTo(Compaign::class, 'compaign_id', 'id_compaign');
	// }
	// public function subscriber(){
 // 		return $this->belongsTo(Subscriber::class, 'subscriber_id', 'id_subscriber');
	// }
 
}
