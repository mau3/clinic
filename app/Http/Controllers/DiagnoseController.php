<?php

namespace App\Http\Controllers;
use App\Diagnosis;
use App\Reception;
use App\Recipe;
use Illuminate\Http\Request;
use App\Http\Requests;



class DiagnoseController extends Controller
{
    public function index()
    {

        return view('home.index');

    }

    public function create($id)
    {
        $rec= Reception::findOrFail($id);
        $diagnose = Diagnosis::get();

        return view('diagnosis.addDiagnosis', compact('diagnose','rec'));

    }


public function showall($id)
{
    $rec= Reception::findOrFail($id);
//dd($rec);
    $ds = Diagnosis::where('reception_id',$id)->get();

    return view('diagnosis.showAll', compact('ds','rec'));

}



    public function store(Request $request)
    {

        $this->validate($request, [
            'content' => 'required',
        ]);


        $diagnose = Diagnosis::create([
            'content' => $request->get('content'),
            'reception_id' => $request->get('reception_id')

        ]);

        return redirect('/receptions/index');
    }  //


}
