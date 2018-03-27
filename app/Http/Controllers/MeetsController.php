<?php

namespace App\Http\Controllers;

use App\Host; 
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
        return view('meets.create');//
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /**$rules = array( 
                'name'          => 'required
                'address'	=> 'required|email'
	);
	
            $validator = Validator::make(Input::all(), $rule);
	
            if ($validator->fails()) {
		        return Redirect::to('admin/hosts/create')
			        ->withErrors($validator)
			        ->withInput;
	} else {
    **/
    
    $meets = new Meet; 
    $meets->name     = $request->name; 
    $meets->address  = $request->address; 
    $meets->slug     = stripslashes(trim($request->slug));
    $meets->start_date = $request->start_date;
    $meets->end_date = $request->end_date;
    $meets->hosts_id = $request->hosts_id;
    $meets->save(); 
    
    return "DONE!"; 
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */    
    } 
    
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
