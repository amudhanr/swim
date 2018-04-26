<?php

namespace App\Http\Controllers;

use App\Hosts;
use App\Meets;
use Validator;
use Redirect;
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
	$meets = Meets::all();
        return view('meets.index', ['meets' => $meets]);//
        return view('meets.index'); 
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
        $validator = Validator::make($request->all(), [
            'name'           => 'required|max:190|string', 
            'slug'           => 'required|max:50|string', 
            'start_date'     => 'required|max:10|date', 
            'end_date'       => 'required|max:10|date', 
       ]); 
        if ($validator->fails()) {
            return Redirect::to('/admin/meets/create')
          	  ->withErrors($validator)
           	  ->withInput();
        }
        $validatedData = $request->all();
        $meets = new Meets;
        $meets->name     = $validatedData['name'];
        $meets->slug     = stripslashes(trim($validatedData['slug']));
        $meets->start_date = date("Y-m-d H:i:s", strtotime($validatedData['start_date']));
        $meets->end_date = date("Y-m-d H:i:s", strtotime($validatedData['end_date']));
        $meets->hosts_id = $validatedData['hosts'];
        $meets->save();

        return Redirect::to('/admin/meets/');
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
