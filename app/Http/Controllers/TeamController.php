<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TeamController extends Controller
{

	public function index()
	{
		return view('teams');
	}

    protected function store(Request $request)
    {
        $this->validate($request, [
            'teamname' => 'required',
            'teamlogo' => 'required',
        ]);
        Video::create($request->all());
        return redirect()->route('teams')
                        ->with('success','Team created successfully');
    }

    // protected function create(array $data)
    // {
    //     return User::create([
    //         'teamname' => $data['teamname'],
    //         'srcimg' => $data['srcimg'],
    //     ]);
    // }
}
