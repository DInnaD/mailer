<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    use Selectable, SoftDeletes, Owned;
    protected $primaryKey = 'id_template';
    protected $name = 'name_template';
    //protected $content = 'content_template';

    protected $fillable = ['name_template', 'content_template', 'created_by'];

    public function user(){
        return $this->hasOne(User::class);
    }
    public function preview(){
            return $this->hasOne(Preview::class, 'template_id', 'id_template');
    }//d 
    public function compaign(){//instaed invertion
            return $this->hasOne(Compaign::class, 'template_id', 'id_template');
    }//d dd
    //////////////////////////////belongsTo///////////////////////////
    	
   
	// public function send(){
 //         return $this->belongsTo(Send::class);
    // }
    // public function getMessage(Subscriber $subscriber, Template $template){

    //     $tags = $this->getTags();

    //     $template->content_template = str_replace(array_keys($tags), array_values($tag), $template->content_template)

    //     return $template->content_template;

    // }//parse error

    // public function getTags(Subscriber $subscriber, Template $template){
    //     return [
    //         '{FIRST_NAME}' => $this->firstname_template,
    //         '{LAST_NAME}' => $this->lastname_template,
    //         '{UNSUBSCRIBE}' => 'http://laravel.loc/report/unsubscribe?email='.$subscriber->email_subscriber
    //     ];
    // }
}
