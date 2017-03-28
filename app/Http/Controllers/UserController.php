<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Staff;
use App\Patient;


class UserController extends Controller
{
        public function index()
            {

              $patients = Patient::with('user')->get();

              $staffs = Staff::with('user','positions')->get();

                return view('staff.staff', compact('staffs','patients'));
            }


    public function showall()
    {

        $patients = Patient::with('user')->get();

        $staffs = Staff::with('user','positions')->get();

        return view('staff.staffUsers', compact('staffs','patients'));
    }
}