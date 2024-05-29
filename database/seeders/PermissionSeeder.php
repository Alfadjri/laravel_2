<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// model 
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            $role = ['admin','user'];
            $role_akes = ['api','web'];

            $permission = ["user create","user update","user read","user delete"];

            // kita bikin logic role
            foreach($role_akes as $akses){
                foreach($role as $value){
                    Role::create(['name' => $value,'guard_name' => $akses]);
                }
            }
            // 
            foreach($role_akes as $akses){
                foreach($permission as $value){
                    Permission::create(['name' => $value,'guard_name' => $akses]);
                }
            }

            // admin memiliki semua permission
            $role = Role::findByName('admin');
            foreach($permission as $value){
                $role->givePermissionTo($value);
            }
    }
}
