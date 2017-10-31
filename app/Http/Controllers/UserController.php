<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\User;
use Illuminate\Http\Request;


use App\Article;


class UserController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
// search Author of article no in blade before registration 'welacome'!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public function index();//(User $user, Article $article)
    {
        //  return view('user.index', [
        //   'users' => User::orderBy('created_at', 'desc')->paginate(10)
        // ]); 

        //  $user = $article->user;
        // return view('', compact('article', 'user'));  	
      Queue::push('SignUpService', compact('user'));
   
    }

}
?>