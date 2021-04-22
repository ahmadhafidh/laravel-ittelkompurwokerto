<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //permission for posts
        Permission::create(['name' => 'posts.index']);
        Permission::create(['name' => 'posts.create']);
        Permission::create(['name' => 'posts.edit']);
        Permission::create(['name' => 'posts.delete']);

        //permission for dosen
        Permission::create(['name' => 'dosen.index']);
        Permission::create(['name' => 'dosen.create']);
        Permission::create(['name' => 'dosen.edit']);
        Permission::create(['name' => 'dosen.delete']);
        
        //permission for matakuliah
        Permission::create(['name' => 'matakuliah.index']);
        Permission::create(['name' => 'matakuliah.create']);
        Permission::create(['name' => 'matakuliah.edit']);
        Permission::create(['name' => 'matakuliah.delete']);

        //permission for waktu
        Permission::create(['name' => 'waktu.index']);
        Permission::create(['name' => 'waktu.create']);
        Permission::create(['name' => 'waktu.edit']);
        Permission::create(['name' => 'waktu.delete']);

        //permission for roles
        Permission::create(['name' => 'roles.index']);
        Permission::create(['name' => 'roles.create']);
        Permission::create(['name' => 'roles.edit']);
        Permission::create(['name' => 'roles.delete']);

        //permission for permissions
        Permission::create(['name' => 'permissions.index']);

        //permission for users
        Permission::create(['name' => 'users.index']);
        Permission::create(['name' => 'users.create']);
        Permission::create(['name' => 'users.edit']);
        Permission::create(['name' => 'users.delete']);
    }
}
