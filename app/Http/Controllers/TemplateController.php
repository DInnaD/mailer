<?php

namespace App\Http\Controllers;

use App\Http\Requests\TemplateRequest;
use App\Template;
use Illuminate\Http\Request;

use App\Http\Requests\PostRequest;
use App\Post;

class TemplateController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Post $post-????????///

    public function index(Template $template)
    {
        //asc
        $templates = $template->orderBy('id_template', 'desc')->get();

//        dd($templates);

//        return view('templates.index', ['templateses' => $templateses]);
         //'templates' => Template::latest()->paginate(10);
        return view('template.index', compact('templates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('template.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Template $template, TemplateRequest $request)
    {
        $template->create($request->all());

        return redirect()->route('template.index');
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   // Template $template or id
    public function edit(Template $template)
    {
       // $data = [
         //   'title' => 'Update info'

        //];
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