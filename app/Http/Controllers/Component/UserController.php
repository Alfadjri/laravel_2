<?php

namespace App\Http\Controllers\Component;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

// model
use App\Models\User as User;
use App\Models\biodata_user as Biodata;

class UserController extends Controller
{
    public function create(String $email,String $password , String $nama_lengkap , String $no_hp ,$alamat = null){
        $user = User::create([
            'email' => $email,
            'password' => Hash::make($password),
        ]);

        $biodata = Biodata::create([
            'user_id' => $user->id,
            'nama_lengkap' => $nama_lengkap,
            'no_handphone' => $no_hp,
            'alamat' => (isset($alamat)) ? $alamat : "belum di setting",
        ]);
        $user->assignRole('admin');

        return true;
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
        $biodata['email'] = $biodata->User->email;
       
        if(isset($values['email'])){
            $biodata->User->update([
                'email' => $values['email'],
            ]);
        }
        if(isset($values['password'])){
            $biodata->User->update([
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

    public function search(String $search = null , int $page_number = 2){
        // pencarian 
        if(empty($search)){
            $biodata = Biodata::paginate($page_number);
            return $biodata;
        }
        $biodata = Biodata::whereHas('User',function(Builder $q) use ($search) {
            $q->where('email','like','%'.$search.'%');
        })
        ->orWhere('nama_lengkap','like','%'.$search.'%')
        ->orWhere('no_handphone','like','%'.$search.'%')
        ->paginate($page_number);

        return $biodata;
    }


    public function detail($id_user = null){
        if(empty($id_user)) return null;
        $biodata = Biodata::find($id_user);
        $biodata->user;
        return $biodata;
    }

    public function delete($id_user = null){
        if(empty($id_user)) return null;
        $biodata = Biodata::find($id_user);
        $user = User::find($biodata['user_id']);
        $biodata->delete();
        $user->delete();
        return true;
    }
}
