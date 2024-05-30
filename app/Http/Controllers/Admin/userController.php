<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// component 
use App\Http\Controllers\Component\UserController as C_User;
use App\Models\biodata_user as Biodata;

// request 
use App\Http\Requests\User\Detail  as R_Detail;
class userController extends C_User
{
    public function dashboard_admin(){
        $biodata = Biodata::select(['id','nama_lengkap','user_id'])->get();
        return view('admin.User.User',['biodata' => $biodata]);
    }
    public function detail_admni_user(R_Detail $request){
        $value = $request->validated();
        $biodata = $this->detail($value['id_user']);
        return view('admin.User.create',['biodata' => $biodata]);
    }
}

