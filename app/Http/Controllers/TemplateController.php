<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemplateRequest;
use App\Template;
use App\Compaign;
use Illuminate\Http\Request;
use App\Owned;
use Illuminate\Support\Facades\Auth;

class TemplateController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Template $template)
    {
        
        //$templates = $template->orderBy('id_template', 'desc')->get();//owned();//created_at


        //return view('template.index', compact('templates'));
        return view('template.index', [
          'templates' => Template::orderBy('created_at', 'desc')->paginate(10)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   
      public function create(Compaign $compaign)
    {
        return view('template.create', compact('compaign'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  
         /**
     * Store a newly created resource in storage.
     *
     * @param TemplateRequest $templateRequest
     * 
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Template $template, TemplateRequest $templateRequest)
    {
        $template->create($templateRequest->all());

        return redirect()->route('template.index', compact('compaign'));//->with('me');
    }

    


    /**
     * Display the specified resource.
     *
     * TODO: $id -> $template
     *
     * @param  Template  $template
     * @return \Illuminate\Http\Response
     */
    public function show(Template $template)
    {
        return view('template.show', compact('template'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_template
     * @return \Illuminate\Http\Response
     */

   // Template $template or id
    public function edit(Template $template)
    {
        return view('template.edit', compact('template'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TemplateRequest  $request
     * @param  Template  $template
     * @return \Illuminate\Http\Response
     */
    public function update(TemplateRequest $request, Template $template)
    {
        $template->update($request->all());
        return redirect()->route('template.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Template  $template
     * @return \Illuminate\Http\Response
     */
    public function destroy(Template $template)
    {
        $template->delete();

        return redirect()->route('template.index');
    }

}