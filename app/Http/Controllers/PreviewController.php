<?php

namespace App\Http\Controllers;

use App\Http\Requests\PreviewRequest;
use App\Preview;
use Illuminate\Http\Request;
use App\Compaign;

use App\Template;
use App\Bunch;
use App\Mail\OrderShipped;

use App\Subscriber;

use App\Mail;
use App\Owned;




class PreviewController extends Controller
{
    //
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //

     //
       //show
     /**
     * Display the specified resource.
     *
     * TODO: $id -> $cpreview
     *
     * @param  Compaign  $compaign
     * @param  Preview $preview
     * 
     * @return \Illuminate\Http\Response
     */
    public function index(Preview $preview, Compaign $compaign)
    {
        $preview = $compaign->preview;
        return view('preview.index', compact('compaign'));
    }
// public function index(Preview $preview, Compaign $compaign, Subscriber $subscriber, Template $template)
//     {
//         $preview = $compaign->preview;
//           return view('preview.index', compact('preview', 'compaign', 'subscriber', 'template'));
//     }

        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\CompaignRequest $request
     * @return \Illuminate\Http\Response
     */
         //storage dlya preview
    public function send(Preview $preview, Compaign $compaign){  

        //$compaign->send();
        $compaign->preview()->send();//$request->all());

    return redirect()->route('compaign.index')->with('success', 'Thanks! Your message has been sent');

}







//         //asc
//        // $sends = $send->orderBy('id_send', 'desc')->get();
// //return view('send.index', compact('compaign ', 'sends'));


//         /////////////////////////////
//         //$email_count_subsciber->count();

//         // 'email_count_send' -> Send::count()
//         // 'sends' -> Send::latest()->paginate(10);
//         /////////////////////////
//         $sends = [

//         'to' -> Mail::raw('Sending emails with Mailgun and Laravel is easy!', function($message)
//             {
     
//                  $message->to('innadanylevska@gmail.com')
//             }),
//         'send' -> Send::latest()->paginate(10)
//                  ];
//         return view('send.index', $sends);
        
//     }

//      public function storeCompaign(CompaignRequest $request, Preview $preview)
//     {
// //(Compaign $compaign, Template $template , Bunch $bunch){
//         foreach ($this->bunch->subscribers as $subscribers) {
            
//             try {
//    // код который может выбросить исключение
   
//         throw new Exception("One")


//        // $send[]; 
//        // na view $subject, to, bodyMessage, but $survay = ['Unsubscribe']
//         // $send = ['subject'] = $compaign->'name_compaign'; 
//         // $send = ['to'] = $subscriber->'mail_subscriber'; 
//         // $send = ['bodyMessage'] = $template->'content_template'; 

//         // $send = ['survay'] = ['Unsubscribe'=>"http://laravel.loc/report/unsubscribe?mailId=1234"]; 

//         // $send = array(
//         //     'subject' => $request->$compaign->name_compaign,
//         //     'to' => $request->$subscriber->'mail_subscriber',
//         //     //'from' = 'danylevskainna@gmail.com',
//         //     'bodyMessage' => $request->$template->'content_template',
//         //     'survey' => ['Unsubscribe'=>'http://laravel.loc/report?mailId=1234']
//         //     );
//        //queueMail::to('example@email.com','User Name')->send(new OrderShipped($opder))





//     // Mail::to('compaign.preview', $send->user(), function($message1) use ($send){
//     //         $massage1->subject($request->$compaign->name_compaign);
//     //         //$massage->from('danylevskainna@gmail.com',);
//     //         $massage1->to($subscriber->mail_subscriber);
//     //         $massage1->message($template->getMessage($subscriber));
//     //     })->send(new OrderShipped($opder));





//     // ->cc($moreUsers)
//     // ->bcc($evenMoreUsers)
//     // ->later($when, new Send($send));
   
//     }
//    //Session::flash('success', 'Thanks! Your message has been sent'); 
// } catch (Exception $e) {
//     // код который может обработать исключение
//     echo $e->getMessage();
//     $faild === false;
// }

//     //Report::create('id', 'from', 'to', 'subject', 'massage', 'send_t', 'viewed', 'unsubscriber', 'failed');
    

//     Report::create([
//             'subject' => $compaign->'name_compaign',
//             'from' => 'danylevskainna@gmail.com',
//             'to' =>  $subscriber->mail_subscriber,            
//             'massage' => $template->'content_template'
//         ]);

//         }
//         return redirect('compaign.index')->with('success', 'Thanks! Your message has been sent');
//     }
    
          


//     /**
//      * Store a newly created resource in storage.
//      *
//      * @param  \Illuminate\Http\Request  $request
//      * @return \Illuminate\Http\Response
//      */
//     public function store(Send $send, SubscriberRequest $request)
//     {
//         $send->create($request->all());

//         return redirect()->route('send.index');
//     }

}
