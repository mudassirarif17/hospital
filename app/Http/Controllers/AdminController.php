<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Models\Appointment;

class AdminController extends Controller
{
    public function addview(){
        return view('admin.add_doctor');
    }

    public function upload(Request $request){
        $doctor = new doctor;
        $image = $request->file;
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorimage' , $imagename);
        $doctor->image = $imagename;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;
        $doctor->save();
        return redirect()->back()->with('message' , "New Dr has been added");
    }

    public function show_appointments(){
        $data = appointment::all();
        return view('admin.show_appointments' , compact('data'));
    }

    public function canceled($id){
        $data = appointment::find($id);
        $data->status = 'Canceled';
        $data->save();
        return redirect()->back();
    }

    public function approved($id){
        $data = appointment::find($id);
        $data->status = 'Approved';
        $data->save();
        return redirect()->back();
    }

    public function show_doctors(){
        $data = doctor::all();
        return view('admin.show_doctors' , compact('data'));
    }

    public function delete_doctor($id){
        $data = doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function update_doctor($id){
        $data = doctor::find($id);
        return view('admin.update_doctor' , compact('data'));
    }

    public function edit_doctor(Request $request , $id){
        $data = doctor::find($id);
        $data->name = $request->name;
        $data->phone = $request->phone;
        $data->speciality = $request->speciality;
        $data->room = $request->room;
        $image = $request->file;
        
            $imagename = time().'.'.$image->getClientOriginalExtension();
            $request->file->move('doctorimage' , $imagename);
            $doctor->image = $imagename;
        
        
        $data->save();
        return redirect()->back();
        
    }
}
