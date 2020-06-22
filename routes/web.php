<?php

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
    return view('welcome');
});
Route::prefix('student')->group(function(){
    Route::get('index','Student\StudentController@index');
    Route::post('index','Student\StudentController@login')->name('student-login');
    Route::get('register','Student\StudentController@register')->name('student-register');
    Route::post('register','Student\StudentController@register')->name('student-register-post');
    Route::group(['middleware' => ['student']],function(){
        Route::get('dashboard','Enrollee\EnrolleeController@dashboard')->name('student-dashboard');
        Route::post('dashboard','Enrollee\EnrolleeController@addEnrolle')->name('add-enrolle');
        Route::get('dashboard/subject','Enrollee\EnrolleeController@loadSubject')->name('load_subject');
    });
});
Route::prefix('admin')->group(function(){
    Route::get('login','Admin\AdminController@login');
    Route::post('login','Admin\AdminController@login')->name('admin-login');
    Route::group(['middleware' => ['admin']],function(){
        Route::get('logout','Admin\AdminController@logout')->name('admin-logout');
        Route::get('dashboard','Admin\AdminController@dashboard')->name('subject');
        Route::post('dashboard','Subject\SubjectController@addSubject')->name('add-subject');
        Route::post('subject/{id}','Subject\SubjectController@editSubject')->name('edit-subject');
        Route::get('subject/{id}','Subject\SubjectController@delSubject')->name('delete-subject');
        Route::get('subject-sched','Schedule\ScheduleController@addSchedule')->name('schedule');
        Route::post('subject-sched','Schedule\ScheduleController@addSchedule')->name('add-sched');
        Route::post('subject-sched/{id}','Schedule\ScheduleController@editSchedule')->name('edit-sched');
        Route::get('subject-sched/{id}','Schedule\ScheduleController@deleteSchedule')->name('del-sched');
        Route::get('room','Room\RoomController@index')->name('room');
        Route::post('room','Room\RoomController@addRoom')->name('add-room');
        Route::post('room/{id}','Room\RoomController@editRoom')->name('edit-room');
        Route::get('room/{id}','Room\RoomController@deleteRoom')->name('del-room');
        Route::get('teacher','Teacher\TeacherController@index')->name('teacher');
        Route::post('teacher','Teacher\TeacherController@addTeacher')->name('add-teacher');
        Route::post('teacher/{id}','Teacher\TeacherController@editTeacher')->name('edit-teacher');
        Route::get('teacher/{id}','Teacher\TeacherController@delTeacher')->name('del-teacher');

    });
});