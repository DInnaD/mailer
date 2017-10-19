<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compaign extends Model
{
    //
   
//for updating without del id or other main fields, stus 'fillable' equal update agriment
   

    use Selectable, SoftDeletes, Avaliable {

        boot as bootOwnedEvents;
    }
    
    

    protected $primaryKey = 'id_compaign';
    protected $attributes = [
        'status' => 10
    ];
    public function getOwenedFields(){

        return 'user_id','created_by';
    }
    public static function boot(){

        parent::boot();
        self::bootOwenedEvents();
        parent::observe(new CampaignsObserver());
    }
    
    protected $fillable = ['name_compaign', 'template_id', 'bunch_id', 'description_compaign'];
   

    

	public function temlates(){
		return $this->hasMany(Temlate::class);
	}
	public function bunches(){
		return $this->hasMany(Bunch::class);
	}	
	public function user(){
		return $this->hasMany(User::class);
	}
	/////////////////////////////////////////////////////
	public function sends(){
 			return $this->belongsTo(Send::class);
	}
	 public function report(){
 		return $this->belongsTo(Report::class);
	}
}
