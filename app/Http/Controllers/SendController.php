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
    //

     //

    public function index(Compaign $compaign , Send $send)
    {
        //asc
       // $sends = $send->orderBy('id_send', 'desc')->get();
//return view('send.index', compact('compaign ', 'sends'));


        /////////////////////////////
        //$email_count_subsciber->count();

        // 'email_count_send' -> Send::count()
        // 'sends' -> Send::latest()->paginate(10);
        /////////////////////////
        $sends = [

 'to' -> Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
 {
     
     $message->to('innadanylevska@gmail.com')
 }),
        'sends' -> Send::latest()->paginate(10)
  ];
  return view('send.index', $sends);
        
    }

    

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     
    public function store(Send $send, SubscriberRequest $request)
    {
        $send->create($request->all());

        return redirect()->route('send.index');
    }
*/
   
}
