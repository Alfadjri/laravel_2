<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


// model
use App\Models\User as User;
use App\Models\biodata_user as Biodata;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $value = [
            'email' => "alfadjri28@gmail.com",
            "password" => "12345678",
            "nama_lengkap" => "alfadjri dwi fadhilah",
            "no_handphone" => "087718611101",
        ];
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
        $user->assignRole('admin');
        
    }
}
