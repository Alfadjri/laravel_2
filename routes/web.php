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
    Route::get('/logout',[C_login::class,'logOut'])->name('admin.logOut');
    Route::group(['prefix'=> 'user'],function(){
        Route::get('/',[C_User::class,'dashboard_admin'])->name('admin.user')->middleware('permission: read user');
        Route::get('/search',[C_User::class,'search_user'])->name('admin.user.search')->middleware('permission: read user');
        Route::get('/detail',[C_User::class,'detail_admin_user'])->name('admin.user.detail');
        Route::get('/create',[C_User::class,'view_create_admin_user'])->name('admin.user.create.page')->middleware('permission: create user');
        Route::post('/create',[C_User::class,'create_admin_user'])->name('admin.user.create')->middleware('permission: create user');
        Route::get('/delete',[C_User::class,'delete_admin_user'])->name('admin.user.delete')->middleware('permission: delete user');
    });
});
Route::group(['prefix'=> 'user','middelware'=> 'auth:sanctum'],function(){

});
