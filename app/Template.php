<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use Selectable;
    use SoftDeletes;
//for updating without del id or other main fields, stus 'fillable' equal update agriment
    protected $primaryKey = 'id_template';
    protected $fillable = ['name_template', 'content_template'];
    
    public function compaign(){
 		return $this->belongsTo(Compaign::class);
	}
	public function send(){
 		return $this->belongsTo(Send::class);
	}
	///////////////////////////////////////////////
    public function user(){
		return $this->hasMany(User::class);
	}
}
