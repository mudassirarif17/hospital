<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
   public function index(){
         $doctor = doctor::all();
         return view('user.home' , compact('doctor'));
   }

   public function appointment(Request $request){
      $data = new appointment;
      $data->name = $request->name;
      $data->email = $request->email;
      $data->date = $request->date;
      $data->phone = $request->phone;
      $data->message = $request->message;
      $data->doctor = $request->doctor;
      $data->status = "In progress";
      if(Auth::id()){
         $data->user_id = Auth::user()->id;
      }
      $data->save();
      return redirect()->back()->with('message' , "Appointment request SuccessFul");
   }


   public function myappointment(){
      if(Auth::id()){
         $user_id = Auth::user()->id;
         $data = appointment::where('user_id' , $user_id)->get();
         return view('user.myappointment' , compact('data'));
      }
      else{
         return redirect()-back();
      }

   }

   public function cancel_appointment($id){
      $data = appointment::find($id);
      $data->delete();
      return redirect()->back();
   }
}
