<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Template extends Model
{
    
    use SoftDeletes;
//for updating without del id or other main fields, stus 'fillable' equal update agriment
    protected $primaryKey = 'id_template';
    protected $fillable = ['name_template', 'content_template'];
    
    public static function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
