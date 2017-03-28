<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

    Route::get('auth/login', 'Auth\AuthController@getLogin');
    Route::post('auth/login', 'Auth\AuthController@postLogin');
    Route::get('auth/logout', 'Auth\AuthController@getLogout');



    Route::get('/', 'HomeController@index');




    Route::get('admin/addUser', 'AdminController@index');
    Route::get('admin/addUser','AdminController@create');
    Route::post('admin/addUser','AdminController@store');



    Route::get('home/index', 'AdminController@index');
    Route::get('home/create', 'AdminController@create');
    Route::post('home/store', 'AdminController@store');
    Route::get('home/about', 'HomeController@about');
    Route::get('home/contact', 'HomeController@contact');




    Route::get('admin/addPosition', 'PositionController@index');
    Route::get('admin/addPosition','PositionController@create');
    Route::post('admin/addPosition','PositionController@store');
    Route::get('admin/delete/{id}','AdminController@delete');
    Route::get('admin/deletepatient/{id}','AdminController@deletepatient');



    Route::get('staff/staff','UserController@index');
    Route::get('staff/staffUsers','UserController@showall');

    Route::get('positions/positions','PositionController@showall');
    Route::get('position/delete/{id}','PositionController@delete');
    Route::post('position/update', 'PositionController@update');
    Route::get('position/edit/{id}','PositionController@edit');

    Route::get('receptions/addReception', 'ReceptionController@index');
    Route::get('receptions/addReception','ReceptionController@create');
    Route::post('receptions/addReception','ReceptionController@store');
    Route::get('receptions/index','ReceptionController@showalldoctor');

    Route::get('news/addNews','NewController@index');
    Route::get('news/addNews','NewController@create');
    Route::post('news/addNews','NewController@store');
    Route::get('news/showNews','NewController@showall');

    Route::get('services/addService','ServiceController@index');
    Route::get('services/addService','ServiceController@create');
    Route::post('services/addService','ServiceController@store');

    Route::get('services/showServices','ServiceController@showall');
    Route::get('services/showServicesUser','ServiceController@showallUser');
    Route::get('news/showone/{id}','NewController@showone');

    Route::get('receptions/indexAdmin','ReceptionController@showall');
    Route::get('receptions/showone/{id}','ReceptionController@showone');

    Route::get('receptions/showone/{id}','ReceptionController@showone');




    Route::get('recipe/create/{id}','RecipeController@create');
    Route::get('recipe/addRecipe','RecipeController@index');
    Route::get('recipe/addRecipe/{id}','RecipeController@create');
    Route::post('recipe/addRecipe','RecipeController@store');



    Route::get('diagnosis/create/{id}','DiagnoseController@create');
    Route::get('diagnosis/addDiagnosis','DiagnoseController@index');
    Route::get('diagnosis/addDiagnosis/{id}','DiagnoseController@create');
    Route::post('diagnosis/addDiagnosis','DiagnoseController@store');

    Route::get('receptions/userReceptions','PatientController@showall');


    Route::get('diagnosis/showall/{id}','DiagnoseController@showall');

    Route::get('recipes/showall/{id}','RecipeController@showall');