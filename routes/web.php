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

//Route::group(['domain' => env('ClientAPP', 'isaudit.test')], function () {
    Route::get('/', 'SiteController@index')->name('index');
    Route::get('/contact', 'SiteController@contact');
    Route::get('/about', 'SiteController@about');
    Route::get('/test', 'SiteController@test');
    Route::get('/test/{test}', 'SiteController@testById');
    Route::post('/setReview', 'SiteController@review');
    Route::post('/getQuestions', 'SiteController@getQuestions');
    Route::post('/setQuestionResult', 'SiteController@setResult');
    Route::get('/solutions', 'SiteController@solutions');
    Route::post('/login', 'SiteController@login');
    Route::get('/analyze', 'SiteController@analyze');
    Route::get('/analyze/{test}', 'SiteController@analyzeById');
//});
Route::group(['domain' => env('ClientAPP', 'isaudit.test')], function () {
    Route::get('/', 'AdminController@index');
    Route::get('/login', 'AdminController@getLogin');
    Route::post('/login', 'AdminController@postLogin');

    Route::get('/users', 'AdminController@getUsers');
    Route::get('/users/add', 'AdminController@getAddUser');
    Route::get('/users/edit/{user}', 'AdminController@getEditUser');
    Route::post('/users/add', 'AdminController@postAddUser');
    Route::post('/users/edit/{user}', 'AdminController@postEditUser');
    Route::get('/users/delete/{user}', 'AdminController@deleteUser');

    Route::group(['middleware' => 'root'], function (){
        Route::get('/company', 'AdminController@getCompany');
        Route::get('/company/add', 'AdminController@getAddCompany');
        Route::get('/company/edit/{company}', 'AdminController@getEditCompany');
        Route::post('/company/add', 'AdminController@postAddCompany');
        Route::post('/company/edit/{company}', 'AdminController@postEditCompany');
        Route::get('/company/delete/{company}', 'AdminController@deleteCompany');
    });

    Route::get('/test', 'AdminController@getTest');
    Route::get('/test/add', 'AdminController@getAddTest');
    Route::post('/test/add', 'AdminController@postAddTest');
    Route::get('/test/delete/{test}', 'AdminController@deleteTest');

    Route::get('/comments', 'AdminController@getComment');
    Route::get('/comment/delete/{review}', 'AdminController@deleteComment');

    Route::get('/request','AdminController@getRequest');

    Route::get('/results','AdminController@getResult');

    Route::post('/getCompanyList', 'AdminController@companyList');

});

Route::get('logout', function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('/');
});