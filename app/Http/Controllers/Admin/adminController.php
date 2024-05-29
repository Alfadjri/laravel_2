<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class adminController extends Controller
{
    //

    // memanggil nama view dashboard user untuk admin

    public function index(){
        return view('dashboard');
    }
}
