<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bunch extends Model
{
    //
	 use Selectable, Owned;
     use SoftDeletes;
     protected $primaryKey = 'id_bunch';
     protected $name = 'name_bunch';
     protected $fillable = ['name_bunch', 'subscriber_id', 'description_bunch', 'created_by'];
     
     public function user(){
        return $this->hasOne(User::class);
    }
     public function subscribers(){
		 return $this->hasMany(Subscriber::class, 'bunch_id', 'id_bunch');
	}//route

    public function compaign(){//instaed invertion
            return $this->hasOne(Compaign::class, 'bunch_id', 'id_bunch');
    }//d dd
    

}
