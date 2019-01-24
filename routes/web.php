<?php


Auth::routes();

//----------------- Home ---------------------//
Route::get('/', 'HomeController@home')->name('home');
Route::get('/home','HomeController@home')->name('home');
Route::post('/home','HomeController@searchQuestion')->name('home.searchQuestion');


//---------------- questions -----------------//
Route::get('/question/addQuestion', 'QuestionController@showQustionForm')->name('question.add');
Route::post('/question/addQuestion','QuestionController@addQuestion');

Route::get('/question/{id}','QuestionController@detailQuestion')->name('qestion.detailQuestion');


//----------------- Admin ----------------------//
Route::get('/admin','AdminController@homeAdmin')->name('admin.home');
Route::get('/admin/listQuestion/{status}','AdminController@listQuestions')->name('admin.listQuestions');

Route::get('/admin/question/{id}','AdminController@detailQuestion')->name('admin.detailQuestion');
Route::post('/admin/changeStatus','AdminController@changeStatus')->name('admin.changeStatus');

//----------------- User ----------------------//
Route::get('/user','UserController@homeUser')->name('user.home');
