<?php

namespace App\Http\Controllers;

use App\Http\Requests\ReportRequest;
use App\Report;
//use App\Http\Requests\CompaignRequest;
//use App\Http\Requests\SubscriberRequest;
use App\Compaign;
use App\Subscriber;
use Illuminate\Http\Request;



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
        $reports = $report->orderBy('id_report', 'desc')->get();
        //'reports'-> Report::latest()->paginate(10);
       // 'subscribers' -> Subscriber::latest();
        return view('report.index', compact('reports'));
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
