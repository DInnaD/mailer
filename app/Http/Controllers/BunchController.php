<?php

namespace App\Http\Controllers;

use App\Http\Requests\BunchRequest;
use App\Bunch;
use App\Subscriber;
use Illuminate\Http\Request;
use App\Owned;
//use Illuminate\Support\Facades\Auth;
use App\Auth;
use App\User;
class BunchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    

    public function index(Bunch $bunch, Subscriber $subscriber)
    {
         return view('bunch.index', [
          'bunches' => Bunch::orderBy('created_at', 'desc')->paginate(10)
        ]); 
        //asc 
       // $bunches = $bunch->orderBy('id_bunch', 'desc')->remember(60)->get();
          
       //   return view('bunch.index', compact('bunches', 'subscribers'));

        //  return view('bunch.index', [
        //   'bunches' => User::find($userId)->bunches
        // ]);

        //  $bunches = User::find($userId)->bunches;
        // return view('bunches.index', compact('bunches', 'subscribers')); 
        //  $bunches = $user->bunches;
        // return view('bunches.index', compact('bunches', 'subscribers')); 

           
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('bunch.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Bunch $bunch, BunchRequest $request)
    {
        $bunch->create($request->all());

        return redirect()->route('bunch.index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param BunchRequest $bunchRequest
     * @param Compaign $compaign
     * @return \Illuminate\Http\RedirectResponse
     */
    
    /**
     * Display the specified resource.
     *
     * TODO: $id -> $bunch
     *
     * @param  Bunch  $bunch
     * @param Subscriber $subscriber
     * @return \Illuminate\Http\Response
     */
    public function show(Bunch $bunch, Subscriber $subscriber)
    {
        return view('bunch.show', compact('bunch', 'subscribers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_bunch
     * @return \Illuminate\Http\Response
     */

   // Post $bunch or id
    public function edit(Bunch $bunch)
    {
      
        return view('bunch.edit', compact('bunch'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BunchRequest  $request
     * @param  Bunch  $bunch
     * @return \Illuminate\Http\Response
     */
    public function update(BunchRequest $request, Bunch $bunch)
    {
        $bunch->update($request->all());
        return redirect()->route('bunch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Bunch  $bunch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bunch $bunch)
    {
        $bunch->delete();

        return redirect()->route('bunch.index');
    }
}
