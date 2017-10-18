<?php

namespace App\Http\Controllers;

use App\Http\Requests\SendRequest;
use App\Send;
use Illuminate\Http\Request;
use App\Compaign;



class SendController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index(Compaign $compaign , Send $send)
    {
        //asc
        $sends = $send->orderBy('id_send', 'desc')->get();
        //$email_count_subsciber->count();

        // 'email_count_send' -> Send::count()
        // 'sends' -> Send::latest()->paginate(10);
        return view('send.index', compact('compaign ', 'sends'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('send.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Send $send, SubscriberRequest $request)
    {
        $send->create($request->all());

        return redirect()->route('send.index');
    }

    /**
     * Display the specified resource.
     *
     * TODO: $id -> $subscriber
     *
     * @param  Send  $send
     * @return \Illuminate\Http\Response
     */
    public function show(Send $send)
    {
        return view('send.show', compact('send'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   // Subscriber $post or id
    public function edit(Send $send)
    {
       // $data = [
         //   'title' => 'Update info'

        //];
        return view('send.edit', compact('send'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SendRequest  $request
     * @param Send  $send
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriberRequest $request, Send $send)
    {
        $send->update($request->all());
        return redirect()->route('send.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  Send  $send
     * @return \Illuminate\Http\Response
     */
    public function destroy(Send $send)
    {
        $send->delete();

        return redirect()->route('send.index');
    }
}
