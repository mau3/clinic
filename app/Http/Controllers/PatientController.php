<?php

namespace App\Http\Controllers;
use App\Reception;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Staff;
use App\Patient;


class PatientController extends Controller
{
    public function index()
    {

        return view('home.index');

    }
    public function showall()
    {


        $receptions = Reception::orderBy('staff_user_id')->get()->groupBy('staff_user_id');


        $patients = Patient::with('user')->get();
        $staff = Staff::with('user')->get();


        return view('receptions.userReceptions', compact('receptions','patients','staff'));

    }

    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {




        return redirect('/home/index');
    }  //

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public
    function show($id)
    {
        //
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}