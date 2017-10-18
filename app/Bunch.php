<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bunch extends Model
{
    //

    use SoftDeletes;
//for updating without del id or other main fields, stus 'fillable' equal update agriment
    protected $primaryKey = 'id_bunch';

     protected $fillable = ['name_bunch', 'subscriber_id', 'description_bunch'];
     


    //in table!!!!!!!!!!!!!!!!! 
     public function subscribers(){
        return $this->hasOne(Subscriber::class, 'id_subscriber', 'subscriber_id');

    } 
     public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
