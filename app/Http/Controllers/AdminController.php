<?php

namespace App\Http\Controllers;
use App\Staff;
use App\Patient;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Position;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home.index');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $position = Position::get();
        return view('admin.addUser', compact('position'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /* dd($request->all());*/
        $this->validate($request, [
            'email' => 'required|unique:users',
            'password' => 'required',
            'surname' => 'required',
            'firstName' => 'required',
            'secondName' => 'required',
            'dob' => 'required',
            'address' => 'required',
            'position' =>'required'
        ]);

        /**
         * @var $user User
         */
        $user = User::create([
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password')),
            'surname' => $request->get('surname'),
            'firstName' => $request->get('firstName'),
            'secondName' => $request->get('secondName'),
            'phoneNumber' => $request->get('phoneNumber'),
            'dob' => $request->get('dob'),
            'address' => $request->get('address'),

        ]);


        if ($request->get('type') == 'patient') {
            Patient::create([
                'user_id' => $user->id,
                'ssn' => $request->get('ssn')
            ]);
        }

        if ($request->get('type') == 'doctor') {
            $staff = Staff::create([
                'user_id' => $user->id,
                'biography' => $request->get('biography'),
                /*'photo' => $request->get('photo')*/
            ]);
             $staff->positions()->sync($request->get('position'));
            if( $request->hasFile('photo') && $request->file('photo') != null) {
                $imageName = str_random(3) . '.' . $request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->move(base_path() . '/public/images/staff/', $imageName);
                $staff->update(['photo' => $imageName]);
            }
        }

        if ($request->get('type') == 'admin') {
            $user->update([
                'isAdmin' => true
            ]);
           $staff = Staff::create([
                'user_id' => $user->id,
                'biography' => $request->get('biography'),
            ]);
            dd($request->all());
            if( $request->hasFile('photo') && $request->file('photo') != null) {
                $imageName = str_random(3) . '.' . $request->file('photo')->getClientOriginalExtension();
                $request->file('photo')->move(base_path() . '/public/images/staff/', $imageName);
                $staff->update(['photo' => $imageName]);
            }

        }
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
    public function deletepatient($id)
    {

        $someid= $id;
        Patient::find($id)->receptions()->delete();
        Patient::where('user_id',$id)->delete();
        Patient::where('user_id',$id)->delete();
        User::where('id',$id)->delete();
        return back();
    }
    public function delete($id)
    {
        $staff = Staff::where('user_id',$id)->first();
        $imageName = $staff -> photo;
        \File::delete(public_path('images\\staff\\'.$imageName));
        $someid= $id;
        Staff::find($id)->receptions()->delete();
        Staff::find($id)->positions()->detach();
        Staff::where('user_id',$id)->delete();
        Staff::where('user_id',$id)->delete();
        User::where('id',$id)->delete();
        return back();
    }

}



