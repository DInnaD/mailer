<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;
use App\User;
use App\Article;

class ArticleUserController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
// public function index(User $user, Article $article)
//     {
//         //получить всех подписчиков из списка просто вызвав свойство обьекта, с которым они связаны
        // $articles = $user = User::find($userId)->articles;//?????????owned();  
        // return view('articles.index', compact('user'));
    //}    
    public function index(Article $article, User $user)
    {
    	$articles = $user->articles;
        return view('articles.index_user', compact('user'));  	
    
    	// get article
        // $user = User::find($user_id);
        // $articles = $user->articles;


        // get user
        // $article = Task::find($user_id);
        // $user = $article->user;


		// $user = User::find($userId);
		// return $user->articles; 

		// $articles = User::find($user)->articles;
		// return view('articles.index', compact('articles'));  


		// return view('articles.index_user', [
  //         'users' => User::orderBy('id', 'desc')->paginate(10)
  //       ]); 
        }
        public function show(User $user, Article $article) {
        return view('articles.show__user', compact('article', 'user'));
    }
    /**
     * Show the form for creating a new resource.

     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Article $article)
    {
       
        return view('articles.create_user', compact('bunch', 'article'));
      
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ArticleRequest $articleRequest
     * @param User $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(User $user, Article $article, ArticleRequest $articleRequest)
    {
        
        $user->articles()->create($articleRequest->all());

        return redirect()->route('articles.index', compact('user', 'article'));//->withBunch($bunch);//->with('me');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   // Subscriber $post or id
    public function edit(User $user, Article $article)
    {
       
        return view('articles.edit_user', compact('user', 'article'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ArticleRequest  $articleRequest
     * @param  User $user
     * @return \Illuminate\Http\Response
     */
    public function update(ArticleRequest $request, Article $article)
    {
        
        $user->articles()->update($articleRequest->all());
        return redirect()->route('articles.index', compact('user'));
    }
    /**
     * Remove the specified resource from storage.
     * @param User $user
     * @param  Article $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, Article $article)
    {
        $article->delete();

        return redirect()->route('articles.index', compact('user'));
    }
}
