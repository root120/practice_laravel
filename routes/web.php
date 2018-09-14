<?php
use App\Http\Middleware\CheckStatus;
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
Route::get('about', function(){
    $array = ['Shuvo', 'is', 'Back'];
    return view('about',['values' => $array]);
});
Route::group(['middleware' => 'auth', 'CheckStatus'], function () {

        Route:: resource('students', 'StudentsController');
        Route:: get('/delete/{id}', 'StudentsController@destroy')->name('khan');
        Route:: post('/delete_stu', ['as'=>'delete.stu' , 'uses'=> 'StudentsController@deleteStu']);
        Route:: post('/edit_stu', ['as'=>'edit.stu' , 'uses'=> 'StudentsController@editStu']);
        Route:: post('/update_stu', ['as'=>'update.stu' , 'uses'=> 'StudentsController@updateStu']);
        Route:: post('/post_stu', ['as'=>'post.stu' , 'uses'=> 'StudentsController@postStu']);
        Route:: post('/post_view', ['as'=>'view.stu' , 'uses'=> 'StudentsController@viewStu']);
        Route:: get('/category', ['as'=>'category' , 'uses'=> 'StudentsController@category']);
        Route:: get('/verifyMailFirst', ['as'=>'verifyMailFirst' , 'uses'=> 'Auth\RegisterController@verifyMailFirst']);
        Route::get('/home', 'HomeController@index')->name('home');
        Route::get('/pdf/{id}', 'pdfController@index')->name('pdf}');
        Route::get('/pdf_all', 'pdfController@pdfAll')->name('pdf_all}');

        Route::get('verify/{email}/{verifyToken}',['as'=>'sendEmailDone' ,'uses'=>'Auth\RegisterController@sendEmailDone']);

});

//Auth::routes()->middleware('CheckStatus');
Auth::routes();

Route::get('/beforeCheck', ['as' =>'beforeCheck', 'uses'=> 'Auth\StudentsController@something' ]);
