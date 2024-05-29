<?php

use Illuminate\Support\Facades\Route;

// panggil controller
use App\Http\Controllers\Admin\adminController as C_admin;
use App\Http\Controllers\loginController as C_login;
use App\Http\Controllers\Admin\userController as C_User;

Route::get('/',[C_login::class,'view_login'])->name('login');
Route::post('/',[C_login::class,'login_user'])->name('send.login');

Route::group(['middleware'=>'permission:user read'],function(){
    Route::get('/logout',[C_login::class,'logOut']);
    Route::get('/admin',function(){
        return view('admin.User.User');
    })->name('admin.dashboard')->middleware('permission:user read');
    Route::get('/user',[C_User::class,'dashboard'])->name('dashboard.user');
    Route::get('/detail/{id_user}',[C_User::class,'detail_view'])->name('detail.user');
});

