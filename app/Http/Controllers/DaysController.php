<?php
namespace App\Http\Controllers;
use App\Days;
use App\Meets;
use Illuminate\Http\Request;
use Validator;
use Redirect;
class DaysController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
	$meets = Meets::pluck('name','id');
        return view('days.create', ['meets' => $meets]);
    }

    public function store(Request $request)
     {
        $validator = Validator::make($request->all(), [
            'name'     => 'required', 
            'meets_id'  => 'required'
        ]);  
        if ($validator->fails())  {
            return Redirect::to('/admin/days/create')
                ->withErrors($validator)
                ->withInput();
        }

        $validatedData  = $request->all(); 
	$days           = new Days;
  	$days->meets_id = $validatedData['meets_id'];
        $days->name = $days->slug = ucwords(strtolower($validatedData['name']));
	$days->youtube_link	= $validatedData['youtube_link']; 
	$days->date = date("Y-m-d", strtotime($validatedData['date'])); 
	  
	$days->save();
	
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
