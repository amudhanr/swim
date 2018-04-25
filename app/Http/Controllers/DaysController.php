<?php
namespace App\Http\Controllers;
use App\Days;
use Illuminate\Http\Request;
class DaysController extends Controller
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
        return view('days.create');//
    }

    public function store(Request $request)
     {
         $validator = Validator::make($request->all(), [
             'name'     => 'required', 
             'address'  => 'required|string|max:190'
         ]);  
            if ($validator->fails())  {
                return Redirect::to('/admin/days/create')
                    ->withErrors($validator)
                    ->withInput();

            }

        $validatedData = $request->all(); 
	$days = new Day;
  	$days->meets_id = $validatedData['meets_id'];
	$days->youtube_link	= $validatedData['youtube_link']; 
	$days->date = $validatedData['date']; 
	$days->slug = $validatedData['slug']; 
	  
	$days->save;
	return "DONE!";
	
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
