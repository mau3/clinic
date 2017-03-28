<?php

namespace App\Http\Controllers;

use App\Services;
use App\Staff;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ServiceController extends Controller
{

    public function index()
    {
        return view('home.index');
    }

    public function showall()
    {
        $services = Services::get();
        return view('services.showServices',compact('services'));
    }
    public function showallUser()
    {
        $services = Services::get();
        return view('services.showServicesUser',compact('services'));
    }
    public function create()
    {
        $staffs = Staff::get();

        return view('services.addService',compact($staffs));

    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'cost' => 'required'
        ]);

        $service= Services::create([
            'name' => $request->get('name'),
            'description' => $request->get('description'),
            'cost' => $request->get('cost'),
            'staff_user_id'=> Auth::id()
        ]);


        return redirect('/home/index');
    }  //


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