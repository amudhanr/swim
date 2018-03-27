<?php
namespace App\Http\Controllers;
use App\Teams;
use Illuminate\Http\Request;
class TeamsController extends Controller
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
        return view('teams.create');//
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
		'name'		=> 'required',
		'address'	=> 'required|email'
	);
	$validator = Validator::make(Input::all(), $rule);
	if ($validator->fails()) {
		return Redirect::to('admin/teams/create')
			->withErrors($validator)
			->withInput;
	} else {
	**/
	$teams = new Team;
	$teams->name	= $request->name;
	$teams->shortName = $request->shortName;
	$teams->address = $request->address;
	$teams->contactPerson = $request->contactPerson;
	$teams->contactEmail = $request->contactEmail;
	$teams->contactPhone = $request->contactPhone;
	$teams->slug = $request->slug;
	  
	$teams->save();
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
