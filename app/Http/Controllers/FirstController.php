<?php

namespace App\Http\Controllers;

use App\Models\FirstModel;
use Illuminate\Http\Request;

class FirstController extends Controller
{

    /**    
     * Instantiate a new controller instance. 
        *     
        * @return void     
        */    
        // public function __construct()    
        // {        
        //     $this->middleware('auth');        
        //     $this->middleware('log')->only('index');        
        //     $this->middleware('subscribed')->except('store');    
        // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return "Hello zah";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FirstModel  $firstModel
     * @return \Illuminate\Http\Response
     */
    public function show(FirstModel $firstModel)
    {
        return view('showless');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FirstModel  $firstModel
     * @return \Illuminate\Http\Response
     */
    public function edit(FirstModel $firstModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FirstModel  $firstModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, FirstModel $firstModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FirstModel  $firstModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(FirstModel $firstModel)
    {
        //
    }
}
