<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompaignRequest;
//use App\Http\Requests\TemplateRequest;
//use App\Http\Requests\BunchRequest;
use App\Compaign;
use App\Template;
use App\Bunch;
use App\Send;
use Illuminate\Http\Request;

class CompaignController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Post $post-????????///

    public function index(Compaign $compaign, Template $template , Bunch $bunch, Send $send)
    {
        //asc
        $compaigns = $compaign->orderBy('id_compaign', 'desc')->get();
       //'compaigns' -> Compaign::latest()->paginate(10);
        //'bunches' -> Bunch::latest();
        // 'templates' -> Template::latest();
        return view('compaign.index', compact('compaigns', 'bunches', 'templates', 'send'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('compaign.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Compaign $compaign, CompaignRequest $request)
    {
        $compaign->create($request->all());

        return redirect()->route('compaign.index');
    }

    /**
     * Display the specified resource.
     *
     * TODO: $id -> $compaign
     *
     * @param  Compaign  $compaign
     * @return \Illuminate\Http\Response
     */
    public function show(Compaign $compaign)
    {
        return view('compaign.show', compact('compaign'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   // Compaign $compaign or id
    public function edit(Compaign $compaign)
    {
       // $data = [
         //   'title' => 'Update info'

        //];
        return view('compaign.edit', compact('compaign'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  CompaignRequest  $request
     * @param  Compaign  $compaign
     * @return \Illuminate\Http\Response
     */
    public function update(CompaignRequest $request, Compaign $compaign)
    {
        $compaign->update($request->all());
        return redirect()->route('compaign.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Compaign  $compaign
     * @return \Illuminate\Http\Response
     */
    public function destroy(Compaign $compaign)
    {
        $compaign->delete();

        return redirect()->route('compaign.index');
    }
}
