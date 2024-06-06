<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\userController as C_User;

// use App\Http\Controllers\Admin\userController as C_user;

// Route::post('/user/create',[C_user::class,'create']);
// Route::post('/user/update',[C_user::class,'update']);
// Route::get('/user/detail',[C_user::class,'detail']);

Route::post('/admin/user/upload_image',[C_User::class,'upload']);
