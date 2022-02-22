<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            return redirect('home');
        } else {
            $doctor = Doctor::all();
            return view('user.home', compact('doctor'));
        }
    }

    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == '0') {
                $doctor = Doctor::all();
                return view('user.home', compact('doctor'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function appointment(Request $request)
    {
        $data = new Appointment;
        $data->name = $request->name;
        $data->email = $request->email;
        $data->date = $request->date;
        $data->phone = $request->number;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status = 'In Progress';
        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }
        $data->save();
        return redirect()->back()->with('message', "Appointment Request successful,please wait until we contact you in the future!");
    }
}
