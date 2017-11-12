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
Use App\User;
Use App\posts;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/create',function(){

    $user= User::findOrFail(2);;

    $ps = new posts(['title'=>'phystorm','body'=>' phython great ide']);

return   $user->posts()->save($ps);


});

Route::get('/read',function (){


    $user= User::findOrFail(1);

    foreach($user->posts as $u)
    {
        echo $u."<br>"."<br>";
    }
});


Route::get('/update',function (){


    $user=User::findOrFail(1);
    $user->posts()->where('user_id','=','1')->update(['title'=>'helooooooo inside from update','body'=>'helooooooooo inside for body']);




});

Route::get('/delete',function(){

    $user=User::findOrFail(1);
    return $user->posts()->where('id','=',1)->delete();


});