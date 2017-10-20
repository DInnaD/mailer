<?php 
namespace App;

trait Selectable
{
 public static function getSelectList($value = 'name', $key = 'id'){
 	return static::latest()->pluck($value, $key);
 }
 public static function getSelectCount($value = 'count', $key = 'id'){
 return static::latest()->owned()->pluck($value, $key);
 }
 public static function getSelectViewed($value = 'viewed', $key = 'id'){
 return static::latest()->owned()->pluck($value, $key);
 }
 public static function getSelectUnsubscriber($value = 'unsubscriber', $key = 'id'){
 return static::latest()->owned()->pluck($value, $key);
 }
 public static function getSelectMail($value = 'mail', $key = 'id'){
 return static::latest()->owned()->pluck($value, $key);
 }
 public static function getSelectContent($value = 'content', $key = 'id'){
 return static::latest()->owned()->pluck($value, $key);
 }

}