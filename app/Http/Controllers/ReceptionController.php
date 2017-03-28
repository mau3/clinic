<?php

namespace App\Http\Controllers;
use App\Reception;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Staff;
use App\Patient;


class ReceptionController extends Controller
{
    public function index()
    {

        return view('home.index');

    }
    public function showall()
    {


       $receptions = Reception::orderBy('staff_user_id')->get()->groupBy('staff_user_id');

//
//        $result будет содержать объект, вызываем $result->all(); и получаем массив:
//[
//    'street1' => [house1, house2],
//    'street2' => [house3, house4],
//]



      //  $receptions = Reception::with('staff','patient')->get();
        $patients = Patient::with('user')->get();
        $staff = Staff::with('user')->get();


        return view('receptions.indexAdmin', compact('receptions','patients','staff'));

    }
    public function showalldoctor()
    {
        $receptions = Reception::with('staff','patient')->get();
        $patients = Patient::with('user')->get();
        $staff = Staff::with('user')->get();


        return view('receptions.index', compact('receptions','patients','staff'));
    }
public function showone($id)
{
    $rec= Reception::findOrFail($id);
    return view('receptions.receptionPage',compact('rec'));
}

    public function create()
    {

        $staffs = Staff::with('user'/*,'positions'*/)->get();

        $patients = Patient::with('user')->get();

        return view('receptions.addReception', compact('staffs','patients'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    /*    dd($patients);*/
      /*  dd($request->all());*/
/*dd($request->get('doctor')[0]);*/
        $this->validate($request, [
            'date' => 'required',
            'time' => 'required'
        ]);


        $reception = Reception::create([
            'date' => $request->get('date'),
            'time' => $request->get('time'),
            'someInformation' => $request->get('someInformation'),
            'patients_user_id' => $request->get('patient')[0],
            'staff_user_id' => $request->get('doctor')[0]

            ]);

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