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

//1 задание
Route::get('/my-name', function () {
    return "Мое ФИО{$_GET('FIO')}";
});

//2 задание
Route::get('/my-friend', function () {
    return "ФИО друга{$_GET('FriendFIO')}";
});

//3 задание
Route::get('/ger-friend/{name}', function ($name) {
    return "Логин друга {$name}";
});

//4 задание
Route::get('/my-city/{city}', function ($city) {
    return "Мой город {$city}";
})->where(['city'=>'[A-Za-z]+']);

//5 задание
Route::get('/level/{lvl}', function ($lvl) {
    if($lvl<0 || $lvl>99){
        return "Такого уровня не бывает";
    }
    elseif ($lvl>0&&$lvl<25){
        return "Новичок";
    }
    elseif ($lvl>26&&$lvl<50){
        return "Специалист";
    }
    elseif ($lvl>51&&$lvl<75){
        return "Босс";
    }
    elseif ($lvl>76&&$lvl<98){
        return "Старик";
    }
    elseif ($lvl==99){
        return "Король";
    }
    return "Что-то пошло не так";
});

//6 задание
Route::get('/working/{name}/{date}', function ($name, $date) {
    return "Название {$name}<br>Дата {$date}";
});

//7 задание
Route::get('/power', function ($power) {
    return \route('power');
})->name('power');

//8 задание
Route::prefix('admin')->group(function (){
    Route::get('/login', function ($login) {
        return \route('login');
    })->name('login');
    Route::get('/logout', function ($logout) {
        return \route('logout');
    })->name('logout');
    Route::get('/info', function ($info) {
        return \route('info');
    })->name('info');
    Route::get('/color', function ($color) {
        return \route('color');
    })->name('color');
});

//9 задание
Route::get('admin/web', function ($login) {
    return redirect('admin/color');
});

//10 задание
Route::get('/color/{hex}', function ($hex) {
    return "Ваш цвет #{$hex}";
})->where(['hex'=>'[0-9A-F]{6}']);
