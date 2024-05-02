<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Models\Doctor;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/



Route::get('/' , [HomeController::class , 'index']);
Route::get('/home' , [HomeController::class , 'index']);

Route::get('/add_doctor_view' , [AdminController::class , 'addview']);
Route::post('/upload_doctor' , [AdminController::class , 'upload']);
Route::get('/show_appointments' , [AdminController::class , 'show_appointments']);
Route::get('/show_doctors' , [AdminController::class , 'show_doctors']);
Route::get('/canceled_appointment/{id}' , [AdminController::class , 'canceled']);
Route::get('/approved_appointment/{id}' , [AdminController::class , 'approved']);
Route::get('/delete_doctor/{id}' , [AdminController::class , 'delete_doctor']);
Route::get('/update_doctor/{id}' , [AdminController::class , 'update_doctor']);
Route::post('/edit_doctor/{id}' , [AdminController::class , 'edit_doctor']);


Route::post('/appointment' , [HomeController::class , 'appointment']);
Route::get('/myappointment' , [HomeController::class , 'myappointment']);
Route::get('/cancel_appointment/{id}' , [HomeController::class , 'cancel_appointment']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if(Auth::id()){
            if(Auth::User()->usertype=='0'){
                $doctor = doctor::all();
                return view('user.home' , compact('doctor'));
            }
            else{
                return view('admin.home');
            }
        }
        else{
            return redirect()->back();
        }
    })->name('dashboard');
});
