<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        if(Auth::id()){
            if(Auth::User()->usertype=='0'){
                return view('user.home');
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
