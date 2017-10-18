<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Compaign extends Model
{
    //
    use SoftDeletes;
//for updating without del id or other main fields, stus 'fillable' equal update agriment
    protected $primaryKey = 'id_compaign';
    
    protected $fillable = ['name_compaign', 'template_id', 'bunch_id', 'description_compaign'];
   
    
    public static function temlate(){
    	return $this->hasOne(Template::class, 'id_template', 'temlate_id');
    }
    public static function bunch(){
        return $this->hasOne(Bunch::class, 'id_bunch', 'bunch_id');
    }
    public static function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    } 
     public function sends(){
        return $this->hasOne(Send::class, 'id_send', 'send_id');

    }
}
