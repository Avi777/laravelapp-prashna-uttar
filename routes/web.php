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


Route::get('/welcome', 'PagesController@welcome');
Auth::routes(['verify' => true]);

Route::middleware('verified')->group(function() {
    Route::get('/', 'QuestionsController@index');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/thread', 'HomeController@thread')->name('thread');

    Route::get('/notes','NotesController@index')->name('notes');
    Route::post('/notes/create',['uses'=>'NotesController@create','as'=>'notes.create']);
    Route::get('/notes/delete/{id}',['uses' => 'NotesController@delete','as' => 'notes.delete']);
    Route::get('/notes/update/{id}',['uses' => 'NotesController@update','as' => 'notes.update']);
    Route::post('/notes/save/{id}',['uses' => 'NotesController@save','as' => 'notes.save']);
    Route::get('/notes/savefromquestion/{id}',['uses' => 'NotesController@savefromquestion','as' => 'notes.savefromquestion']);
    
    
    Route::resource('questions', 'QuestionsController')->except('show', 'index');
    // Route::post('/questions/{question}/answers', 'AnswersController@store')->name('answers.store');
    Route::resource('questions.answers', 'AnswersController')->except(['create', 'show']);
    Route::post('/answers/{answer}/accept', 'AcceptAnswerController')->name('answers.accept');
    
    Route::post('/questions/{question}/favorites', 'FavoritesController@store')->name('questions.favorite');
    Route::delete('/questions/{question}/favorites', 'FavoritesController@destroy')->name('questions.unfavorite');
    
    Route::post('/questions/{question}/vote', 'VoteQuestionController');
    Route::post('/answers/{answer}/vote', 'VoteAnswerController');
});

Route::get('/questions/{slug}', 'QuestionsController@show')->name('questions.show');
Route::get('/questions', 'QuestionsController@index')->name('questions.index');