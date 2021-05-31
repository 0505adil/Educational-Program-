<?php

use App\Models\Group;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('auth/login');
});

//Route::get('/test', function() {
//    $group = Group::query()
//        ->with('students')
//        ->find(1);
//
//    dd($group);
//});


Auth::routes();

Route::get('/admin', [App\Http\Controllers\AdminController::class, 'index'])->name('/admin');


Route::get('/depAdmin', [App\Http\Controllers\DepAdminController::class, 'index'])->name('/adminOfDepartment');
Route::get('/depAdmin/addRup', [App\Http\Controllers\DepAdminController::class, 'addRup'])->name('/adminOfDepartment');
Route::get('/depAdmin/otherDepDisciplines', [App\Http\Controllers\DepAdminController::class, 'otherDepDis'])->name('/adminOfDepartment');
Route::get('/depAdmin/uploadDiscipline', [App\Http\Controllers\DepAdminController::class, 'uploadDiscipline'])->name('/adminOfDepartment');
Route::get('/depAdmin/teacherLoad', [App\Http\Controllers\DepAdminController::class, 'teacherLoad'])->name('/adminOfDepartment');
Route::get('/depAdmin/uploadTeacherLoad', [App\Http\Controllers\DepAdminController::class, 'uploadTeacherLoad'])->name('/adminOfDepartment');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('/profile');
Route::get('/profile/sign', [App\Http\Controllers\ProfileController::class, 'keySign'])->name('/profile');
Route::get('/syllabus', [App\Http\Controllers\ProfileController::class, 'syllabus'])->name('/syllabus');
Route::post('/syllabus/confirm', [App\Http\Controllers\ProfileController::class, 'confirm'])->name('/syllabus/confirm');
Route::get('/syllabus/add', [App\Http\Controllers\ProfileController::class, 'addDiscipline'])->name('/syllabus');
Route::post('/profile/edit', [App\Http\Controllers\ProfileController::class, 'setData'])->name('/profile/edit');


Route::get('/tProfile', [App\Http\Controllers\tProfileController::class, 'index'])->name('profile');
Route::get('/tSyllabus', [App\Http\Controllers\tProfileController::class, 'syllabus'])->name('profile/syllabus');
Route::get('/tProfile/syllabus/filter', [App\Http\Controllers\tProfileController::class, 'filter'])->name('profile/syllabus/filter');
Route::get('/tProfile/syllabus/send', [App\Http\Controllers\tProfileController::class, 'send'])->name('profile/syllabus/send');
Route::get('/tProfile/myGroups', [App\Http\Controllers\tProfileController::class, 'myGroups'])->name('profile/groups');
Route::get('/tProfile/reports', [App\Http\Controllers\tProfileController::class, 'reports'])->name('profile/reports');
Route::get('/report/download', [App\Http\Controllers\tProfileController::class, 'reportDownload'])->name('/report/download');
Route::get('/tProfile/report/{id}', [App\Http\Controllers\tProfileController::class, 'report'])->name('/tProfile/report');
Route::get('/pps', [App\Http\Controllers\tProfileController::class, 'pps'])->name('/pps');


Route::get('/iup', [App\Http\Controllers\ZavkafController::class, 'iup'])->name('iup');
Route::get('/ppsList', [App\Http\Controllers\ZavkafController::class, 'pps'])->name('pps');
Route::get('/news', [App\Http\Controllers\ZavkafController::class, ' news'])->name('news');
