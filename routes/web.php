<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Democontroller;
use App\Http\Controllers\Registercontroller;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get("/", [Democontroller::class,"index"]);

Route::get("/login",[Registercontroller::class,"login"])->name('login');
Route::post("/user-login",[Registercontroller::class,"user_login"])->name('user-login');
Route::get("/register",[Registercontroller::class,"index"])->name('register');
Route::post("/user-register",[Registercontroller::class,"register"])->name('user-register');
Route::get("/home",[Registercontroller::class,"home"])->name('home');
Route::get("/navbar",[Registercontroller::class,"navbar"])->name("navbar");
Route::get("/manage",[Registercontroller::class,"manage"])->name("manage");
Route::get("/read/{id}",[Registercontroller::class,"read"])->name("read");
Route::get("/update/{id}",[Registercontroller::class,"update"])->name("update");
Route::get("/manage_admission",[Registercontroller::class,"manage_admission"])->name("manage_admission");
Route::get("/manage_student",[Registercontroller::class,"manage_student"])->name("manage_student");
Route::get("/manage_teacher",[Registercontroller::class,"manage_teacher"])->name("manage_teacher");
Route::post('/delete', [Registercontroller::class, 'delete'])->name('user.delete');
Route::post('/saveupdate', [Registercontroller::class, 'saveupdate'])->name('saveupdate');
Route::get('/show-saveupdate', [Registercontroller::class, 'show_saveupdate'])->name('show-saveupdate');
Route::post('/change-role',[Registercontroller::class,"change"])->name('change.role');
Route::get('/profile',[Registercontroller::class,"profile"])->name('profile');
Route::get('/profile_admission',[Registercontroller::class,"profile_admission"])->name('profile_admission');
Route::get('/profile_teacher',[Registercontroller::class,"profile_teacher"])->name('profile_teacher');
Route::get('/profile_student',[Registercontroller::class,"profile_student"])->name('profile_student');
Route::get('/admission',[Registercontroller::class,"admission"])->name('admission');
Route::get("/manage_user_ad",[Registercontroller::class,"manage_user_ad"])->name("manage_user_ad");
Route::get("/manage_student_ad",[Registercontroller::class,"manage_student_ad"])->name("manage_student_ad");
Route::get('/teacher',[Registercontroller::class,"teacher"])->name('teacher');
Route::get("/manage_student_marks",[Registercontroller::class,"manage_student_marks"])->name("manage_student_marks");
Route::get('/student',[Registercontroller::class,"student"])->name('student');
Route::get('/updatestudentad/{id}',[Registercontroller::class,"updatestudentad"])->name('updatestudentad');
Route::get('/logout',[Registercontroller::class,"logout"])->name('logout');
Route::post('states_by_country', [Registercontroller::class, 'states_by_country'])->name('states_by_country');
Route::post('cities_by_state', [Registercontroller::class, 'cities_by_state'])->name('cities_by_state');
Route::get('/updatestudent/{id}',[Registercontroller::class,"updatestudent"])->name('updatestudent');
Route::post('/saveupdatestudent', [Registercontroller::class, 'saveupdatestudent'])->name('saveupdatestudent');
Route::post('/saveupdatestudentad', [Registercontroller::class, 'saveupdatestudentad'])->name('saveupdatestudentad');
Route::get('/assign',[Registercontroller::class,"assign"])->name('assign');
Route::post('/saveassign',[Registercontroller::class,"saveassign"])->name('saveassign');
Route::get('/updatestudentmarks/{id}',[Registercontroller::class,"updatestudentmarks"])->name('updatestudentmarks');
Route::post('/saveamarks',[Registercontroller::class,"savemarks"])->name('savemarks');













