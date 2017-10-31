<?php 
namespace App;

trait Selectable
//::select('author', app('Author')->pluck...
{
 public static function getSelectList($value = 'name', $key = 'id'){
 	return static::latest()->pluck($value, $key);//, null, ['placeholder'=>'Select item'];
 
 }

}