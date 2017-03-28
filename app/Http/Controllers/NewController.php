<?php

namespace App\Http\Controllers;

use App\Staff;
use Illuminate\Pagination\Paginator;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\News;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class NewController extends Controller
{

    public function index()
{
    return view('home.index');
}
    public function showone($id)
    {
        $new = News::findOrFail($id);
        return view('news.newPage',compact('new'));
    }
    public function showall()
    {
        $news = News::paginate(5);
        /* $news = News::get();*/
         return view('news.showNews',compact('news'));
     }

     public function create()
     {
         $staffs = Staff::get();

         return view('news.addNews',compact($staffs));

     }

     public function store(Request $request)
     {
         $this->validate($request, [
             'dateofPublish' => 'required',
             'title' => 'required',
             'description' => 'required'

         ]);

         $new= News::create([
             'dateofPublish' => $request->get('dateofPublish'),
             'title' => $request->get('title'),
             'description' => $request->get('description'),
             'staff_user_id'=> Auth::id()
         ]);
         if( $request->hasFile('picture') && $request->file('picture') != null) {
             $imageName = str_random(3) . '.' . $request->file('picture')->getClientOriginalExtension();
             $request->file('picture')->move(base_path() . '/public/images/new/', $imageName);
             $new->update(['picture' => $imageName]);
         }
         else $new-> update(['picture' =>""]);
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
