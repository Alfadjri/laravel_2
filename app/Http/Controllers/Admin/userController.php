<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

// component 
use App\Http\Controllers\Component\UserController as C_User;
use App\Models\biodata_user as Biodata;

// request 
use App\Http\Requests\User\Detail  as R_Detail;
use App\Http\Requests\User\Create as R_Create;
class userController extends C_User
{
    public function dashboard_admin(){
        $biodata = Biodata::select(['id','nama_lengkap','user_id'])->get();
        return view('admin.User.User',['biodata' => $biodata]);
    }
    public function detail_admin_user(R_Detail $request){
        $value = $request->validated();
        $biodata = $this->detail($value['id_user']);
        return view('admin.User.create',['biodata' => $biodata]);
    }

    public function delete_admin_user(R_Detail $request){
        $value = $request->validated();
        $this->delete($value['id_user']);
        return redirect()->route('admin.user');
    }

    public function view_create_admin_user(){
        return view('admin.User.Create');
    }

    public function create_admin_user(R_Create $request){
        $value = $request->validated();
        $value['alamat'] = (isset($value['alamat'])) ? $value['alamat'] : null;
        $this->create($value['email'],$value['password'],$value['nama_lengkap'],$value['no_handphone'],$value['alamat']);
        return redirect()->route('admin.user');
    }

    public function search_user(Request $request){
        $value = $request->validate([
            'search' => ['nullable','string'],
            'page_per_list' => ['nullable','numeric'],
        ]);
        $value['search'] = (isset($value['search'])) ? $value['search'] : null;
        $biodata = $this->search($value['search']);
        return view('admin.User.User',['biodata'=> $biodata]);
    }

    public function upload(Request $request){
        $value = $request->validate([
            'image' => ['required'],
            'id' => ['required'],
        ]);
        $store_image = $this->upload_image($value['id'], $value['image']);

        return response()->json([
            'pesan' => "Berhasil",
            'response' => asset($store_image),
        ],200);
    }
}

