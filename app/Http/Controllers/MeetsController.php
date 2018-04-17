<?php

namespace App\Http\Controllers;

use App\Hosts;
use App\Meets;
use Illuminate\Http\Request;

class MeetsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$hosts = Hosts::pluck('name','id');
        return view('meets.create', ['hosts' => $hosts]);//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = $request->validate([
            'name'           => 'required|max:190|string', 
            'slug'           => 'required|max:50|string', 
            'start_date'     => 'required|max:10|date', 
            'end_date'       => 'required|max:10|date', 
       ]); 
        if ($validator->fails()) {
            return "Form Error";
            return Redirect::to('/admin/meets/create')
          	  ->withErrors($validator)
           	  ->withInput();
        }
        $validatedData = $request->validated();
        $meets = new Meets;
        $meets->name     = $validatedData->name;
        $meets->slug     = stripslashes(trim($validatedData->slug));
        $meets->start_date = $validatedData->start_date;
        $meets->end_date = $validatedData->end_date;
        $meets->hosts_id = $validatedData->hosts_id;
        $meets->save();

        return "DONE!";
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
