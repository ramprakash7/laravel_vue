<?php

use App\Http\Controllers\projectController;

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
    return view('view_projects');
});

Route::get('skills',function() {
    return ['Larvel','Php','Ajax','Vue Js'];
});


Route::get('projects/create','projectController@createProject');

// Route::get('projects',[projectController::class,'index']);
// Route::post('projects','App\Http\Controllers\Api\projectController@store');
// Route::post('projects','projectController@store');

Route::post('projects',[projectController::class,'store']);
Route::get('projects/view',[projectController::class,'projectsView']);

