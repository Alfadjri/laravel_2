<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// model
use App\Models\User as User;
use App\Models\biodata_user as Biodata;

class UserController extends Controller
{
    public function create(Request $request){
        //  ini validate inline
        $value = $request->validate([
            'email' => ['required','email','unique:users,email'],
            'password' => ['required','string','min:8'],
            'nama_lengkap' => ['required','string'],
            'no_handphone' => ['required','string'],
            'alamat' => ['nullable'],
        ]);
        // craete
        $user = User::create([
            'email' => $value['email'],
            'password' => Hash::make($value['password']),
        ]);

        $biodata = Biodata::create([
            'user_id' => $user->id,
            'nama_lengkap' => $value['nama_lengkap'],
            'no_handphone' => $value['no_handphone'],
            'alamat' => (isset($value['alamat'])) ? $value['alamat'] : "belum di setting",
        ]);

        return response()->json([
            'status' => [
                'pesan' => "Berhasil membuat user",
            ],
        ],200);
    }

    public function update(Request $request){
        $values = $request->validate([
            'id_user' => ['required','exists:biodata_users,id'],
            'email' => ['nullable','email','unique:users,email'],
            'password' => ['nullable','string','min:8'],
            'nama_lengkap' => ['nullable','string'],
            'no_handphone' => ['nullable','string'],
            'alamat' => ['nullable'],
        ]);
        $biodata = Biodata::find($values['id_user']);
        $biodata['email'] = $biodata->user->email;
       
        if(isset($values['email'])){
            $biodata->user->update([
                'email' => $values['email'],
            ]);
        }
        if(isset($values['password'])){
            $biodata->user->update([
                'password' => Hash::make($values['password']),
            ]);
        }
        if(isset($values['nama_lengkap'])){
            $biodata->update([
                'nama_lengkap'=> $values['nama_lengkap'],
            ]);
        }
        if(isset($values['no_handphone'])){
            $biodata->update([
                'no_handphone' => $values['no_handphone'],
            ]);
        }
        if(isset($values['alamat'])){
            $biodata->update([
                'alamat'=> $values['alamat'],
            ]);
        }

        return response()->json([
            'status' => [
                'pesan' => "Berhasil update user",
            ],
        ],200);
    }


    public function detail($id_user = null){
        if(empty($id_user)) return null;
        $biodata = Biodata::find($id_user);
        $biodata->user;
        return $biodata;
    }

    public function delete(Request $request){
        $value = $request->validate([
            'id_user' => ['required'],
        ]);
        $biodata = Biodata::find($value['id_user']);
        $biodata->user->delete();
        $biodata->delete();
    }
}
