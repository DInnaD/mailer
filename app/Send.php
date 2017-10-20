<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Send extends Model
{
    //
    use Selectable;
    protected $primaryKey = 'id_send';
  
//for updating without del id or other main fields, stus 'fillable' equal update agriment
   // protected $fillable = ['subject_send', 'to_send', 'from_send', 'message_send'];//'email_count_mail' not migrate
    
    protected $fillable = ['compaign_id', 'to_send', 'subscriber_id', 'template_id'];



    //????????????????????????????????api
 //    public function to_APIs(){
	// 	return $this->hasMany(To_API::class);
	// }
    public function templates(){
		return $this->hasMany(Template::class);
	}
    public function subscribers(){
		return $this->hasMany(Subscriber::class);
	}
    public function compaigns(){
		return $this->hasMany(Compaign::class);
	}
	public function user(){
		return $this->hasMany(User::class);
	
	}

}
