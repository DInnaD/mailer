<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bunch extends Model
{
    //
	 use Selectable;
     use SoftDeletes;
//for updating without del id or other main fields, stus 'fillable' equal update agriment
     protected $primaryKey = 'id_bunch';

     protected $fillable = ['name_bunch', 'subscriber_id', 'description_bunch'];
     
     public function subscribers(){
		 return $this->hasMany(Subscriber::class);
	}
     public function user(){
		return $this->hasMany(User::class);
	}

}
