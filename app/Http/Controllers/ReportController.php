<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Report;
use App\Compaign;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Owned;
use Illuminate\Support\Facades\Auth;



class ReportController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index(Report $report)
    {
        //asc
        //'reports'-> Report::latest()->paginate(10);
       // 'subscribers' -> Subscriber::latest();

        $reports = $report->orderBy('id_report', 'desc')->get();
        
        return view('report.index', compact('reports'));
        // return view('report.index', [
        //   'reports' => Report::orderBy('created_at', 'desc')->paginate(10)
        // ]);
    }

    public function unsubscribe(Request $request){
        $subscriber = Subscriber::where('email_subscriber', $request->email);

        $subscriber->destroy();

        $unsubscriber === false;//count  yak ih GLOBAL zrobyty i $ failed iz compaign model?????????? 

    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Report $report, ReportRequest $request)
    {
        $report->create($request->all());

        return redirect()->route('report.index');
    }

    /**
     * Display the specified resource.
     *
     * TODO: $id -> $report
     *
     * @param  Report  $report
     * @return \Illuminate\Http\Response
     */
    public function show(Report $report)
    {
        return view('report.show', compact('report'));
    }

   
}
