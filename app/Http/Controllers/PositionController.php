<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Position;

class PositionController extends Controller
{
    public function index()
    {

        return view('home.index');
    }
    public function showall()
    {
        $position = Position::get();
        return view('positions.positions', compact('position'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.addPosition');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:positions',
        ]);

        /**
         * @var $position Position
         */
        $position = Position::create([
            'name' => $request->get('name'),
            'description' => $request->get('description')
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
      $position = Position::findOrFail($id);
        return view('positions.edit',compact('position'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $position = Position::findOrFail($request->input('id'));
        $data = array(
            'name' => $request->input('name'),
            'description' => $request->input('description')
        );
        $position->update($data);

        return redirect('/home/index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        Position::find($id)->staff()->detach();
        Position::where('id',$id)->delete();

        return back();
    }
}