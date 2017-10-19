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
    
    public function compaigns(){
		return $this->hasMany(Compaign::class);
	}
	public function subscribers(){
		return $this->hasMany(Subscriber::class);
	}
	/////////////////////////////////////////////////////
 
}
