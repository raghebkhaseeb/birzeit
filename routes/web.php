<?php


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


//Route::get('/students', function(){
//    return "list students >>>>>>>>>>>>";
//});
//
//Route::get('/students/{id}', function($id){
//    return "get a student $id";
//});
//
//Route::get('/students/info/{?id}', function($id){
//    return "get student info: $id";
//});
//
//Route::get('/students/delete/{id}', function($id){
//    return "delete student $id";
//});


Route::prefix('/students')->group(function(){

    Route::get('/', 'StudentsController@index')->name('students-index');
//    Route::get('/{id}', 'StudentsController@show');
    Route::get('/{student}/courses', 'StudentsController@courses');
    Route::get('/create', 'StudentsController@create');
    Route::get('/show/{student}', 'StudentsController@show');
    Route::get('/edit/{student}', 'StudentsController@edit');
    Route::get('/delete/{student}', 'StudentsController@delete');
    Route::post('/save', 'StudentsController@save');
});

Route::prefix('/courses')->group(function(){
    Route::get('/', 'CoursesController@index');
    Route::get('/{id}/students', 'CoursesController@students');
});


Route::get('/contact', function(){
    return "Contact us page";
});



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
