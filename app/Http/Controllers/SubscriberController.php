<?php

namespace App\Http\Controllers;

use App\Http\Requests\SubscriberRequest;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Bunch;

class SubscriberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //Subscriber $subscriber-????????///

    public function index(Bunch $bunch, Subscriber $subscriber )
    {
        //$subscribers = $bunch->subscribers;
       // public function someFunction(Bunch $bunch){
$subscribers = Subscriber::where('bunch_id', $bunch->id_subscriber)->get();
//}



        //asc
        //$subscribers = $subscriber->orderBy('id_subscriber', 'desc')->get();


        //$email_count_subsciber = [
// $subscribers = [
//          'id_subscribers' => Subscriber::latest()->paginate(10),
//          'email_count_subsciber' => Subscriber::count()
//         ];
        //$email_count_subsciber->count();

        // 'email_count_subsciber' -> Subscriber::count()
        // 'subscribers' -> Subscriber::latest()->paginate(10);
        //
return view('subscriber.index', compact('bunch', 'subscribers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('subscriber.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Subscriber $subscriber, SubscriberRequest $request)
    {
        $subscriber->create($request->all());

        return redirect()->route('subscriber.index');
    }

    /**
     * Display the specified resource.
     *
     * TODO: $id -> $subscriber
     *
     * @param  Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Subscriber $subscriber)
    {

        return view('subscriber.show', compact('subscriber'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

   // Subscriber $post or id
    public function edit(Subscriber $subscriber)
    {
       // $data = [
         //   'title' => 'Update info'

        //];
        return view('subscriber.edit', compact('subscriber'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  SubscriberRequest  $request
     * @param  Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function update(SubscriberRequest $request, Subscriber $subscriber)
    {
        $subscriber->update($request->all());
        return redirect()->route('subscriber.index');
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  Subscriber  $subscriber
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subscriber $subscriber)
    {
        $subscriber->delete();

        return redirect()->route('subscriber.index');
    }
}
