<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\Http\Requests\ArticleRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    //removeImage()
    //uploadImage()
    //getImage
    //setCategory--without--polim manyToMany
    //setTags()
    //toggleStatus 1 or if acept by admin=0
    //toggleFeatured()
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()//$userId?????????????/
    {
        
        return view('articles.index', [
          'articles' => Article::orderBy('created_at', 'desc')->paginate(10)
        ]);
        // $articles = User::find($userId)->articles;
        // return view('articles.index', compact('articles'));      
   
    }


      /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function welcome()
    {
        return view('welcome', [
          'articles' => Article::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('articles.create', [
          'article'    => [],
          //'validator' => Validator::make($article, $rules),
          'categories' => Category::with('children')->where('parent_id', 0)->get(),
          'delimiter'  => ''
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Article $article, $rules)
    {
        $validator = Validator::make($article, $rules);
        $article = Article::create($request->all());

        // Categories
        if($request->input('categories')) :
          $article->categories()->attach($request->input('categories'));
        endif;

        return redirect()->route('article.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        return view('articles.edit', [
          'article'    => $article,
          'categories' => Category::with('children')->where('parent_id', 0)->get(),
          'delimiter'  => ''
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article, $rules)
    {
        $validator = Validator::make($article, $rules);
        $article->update($request->except('slug'));

        // Categories
        $article->categories()->detach();
        if($request->input('categories')) :
          $article->categories()->attach($request->input('categories'));// prisoedenit attach
        endif;

        return redirect()->route('article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->categories()->detach();//disconnect all migration
        $article->delete();

        return redirect()->route('article.index');
    }
}