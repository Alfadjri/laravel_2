<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\loginController as C_login;
use App\Http\Controllers\Admin\adminController as C_Admin;
use App\Http\Controllers\Admin\userController as C_User;

// panggil controller

Route::get('/',[C_login::class,'view_login'])->name('login');
Route::post('/',[C_login::class,'login_user'])->name('send.login');


Route::group(['prefix' => 'admin','middelware' => 'auth:sanctum'],function(){
    Route::get('/',[C_Admin::class,'index'])->name('admin.dashboard');
    Route::group(['prefix'=> 'user'],function(){
        Route::get('/',[C_User::class,'dashboard_admin'])->name('admin.user')->middleware('permission: read user');
        Route::get('/detail',[C_User::class,'detail_admni_user'])->name('admin.user.detail');
    });
});
Route::group(['prefix'=> 'user','middelware'=> 'auth:sanctum'],function(){

});
