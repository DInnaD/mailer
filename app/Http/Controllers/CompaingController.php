<?php

namespace App\Http\Controllers;

use App\Http\Requests\CompaignRequest;

use App\Template;
use App\Bunch;
use App\Mail\OrderShipped;
use App\Preview;
use App\Subscriber;
use App\Http\Requests;//\PostRequest;
use Illuminate\Http\Request;
use App\Mail;
use App\Owned;
use Illuminate\Support\Facades\Auth;

class CompaignController extends Controller{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(App\Compaign $compaign, Template $template , Bunch $bunch, Preview $preview)
    {

        // $compaigns = $compaign->orderBy('id_compaign', 'desc')->get();
       
        // return view('compaign.index', compact('compaigns', 'bunches', 'templates', 'previews'));
        return view('compaign.index', [
          'compaigns' => App\Compaign::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }
    //show
     /**
     * Display the specified resource.
     *
     * TODO: $id -> $compaign
     *
     * @param  Compaign  $compaign
     * @param  Subscriber $subscriber
     * @param  Template $template
     * 
     * @return \Illuminate\Http\Response
     */
 
     /*public function preview(Compaign $compaign){  

        return view('compaign.preview', compact('compaign'));

    } */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CompaignRequest $request
     * @return \Illuminate\Http\Response
     */
         //storage dlya preview
    public function send(Compaign $compaign, CompaignRequest $request, Preview $preview, Template $template , Bunch $bunch){  

        $compaign->send();
        //$preview->send();

    return redirect()->route('compaign.index')->with('success', 'Thanks! Your message has been sent');

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
     * @param  int  $id_compaign
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
