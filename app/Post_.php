<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{

    use SoftDeletes;
//for updating without del id or other main fields, stus 'fillable' equal update agriment
    protected $fillable = ['message'];
}
