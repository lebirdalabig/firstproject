<?php
use App\User;
use Illuminate\Support\Facades\Input;
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
    return view('home');
});

Auth::routes();

Route::get('/teams', 'TeamController@index')->name('teams');
Route::post('/teams', 'TeamController@store')->name('teams');
Route::get('/dashboard', 'DashboardController@index')->name('dashboard');
// Route::get('dashboard', 'DashboardController@index')->name('dashboard');
// Route::get('dashboard/getdata', 'DashboardController@getdata')->name('dashboard/getdata');
Route::any('/search',function(){
    $q = Input::get ( 'q' );
    $user = User::where('fname','LIKE','%'.$q.'%')->orWhere('email','LIKE','%'.$q.'%')->orWhere('lname','LIKE','%'.$q.'%')->orWhere('address','LIKE','%'.$q.'%')->orWhere('username','LIKE','%'.$q.'%')->get();
    if(count($user) > 0)
        return view('search')->withDetails($user)->withQuery ( $q );
    else return view ('search')->withMessage('No Details found. Try to search again !');
});