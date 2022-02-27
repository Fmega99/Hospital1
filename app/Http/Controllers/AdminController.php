<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
    public function addview()
    {
        return view('admin.add_doctor');
    }

    public function upload(Request $request)
    {
        $doctor = new Doctor;
        $image = $request->file;
        $imagename = time() . '.' . $image->getClientoriginalExtension();
        $request->file->move('doctorimage', $imagename);
        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->number = $request->number;
        $doctor->room = $request->room;
        $doctor->Speciality = $request->Speciality;
        $doctor->save();
        return redirect()->back()->with('message', 'Doctor Added Successfully!');
    }
    public function show_appointments()
    {
        $data = Appointment::all();
        return view('admin.show_appointments', compact('data'));
    }
    public function approved($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Approved';
        $data->save();
        return redirect()->back();
    }
    public function cancelled($id)
    {
        $data = Appointment::find($id);
        $data->status = 'Rejected';
        $data->save();
        return redirect()->back();
    }
    public function showdoctor()
    {
        $doc = Doctor::all();
        return view('admin.showdoctor', compact('doc'));
    }
    public function deletedoctor($id)
    {
        $doc = Doctor::find($id);
        $doc->delete();
        return redirect()->back();
    }
    public function updatedoctor($id)
    {
        $data = Doctor::find($id);
        return view('admin.updatedoctor', compact('data'));
    }
    public function editdoctor(Request $request, $id)
    {
        $doctor = Doctor::find($id);
        $doctor->name = $request->name;
        $doctor->number = $request->number;
        $doctor->Speciality = $request->Speciality;
        $doctor->room = $request->room;
        $image = $request->file;
        if ($image) {
            $imagename = time() . '.' . $image->getClientoriginalExtension();
            $request->file->move('doctorimage', $imagename);
            $doctor->image = $imagename;
        }
        $doctor->save();
        return redirect()->back()->with('message', 'Data updated successfully!');
    }
    public function emailview($id)
    {
        return view('admin.email_view');
    }
}
