<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Role;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');
        User::truncate();

        User::create([
            'name'=> 'Super Admin',
            'email' => 'superadmin@admin.com',
            'password' => Hash::make('superadmin'),
            'role_id' => 1
        ]);
        User::create([
            'name'=> 'Admin User',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
            'role_id' => 2
        ]);
        User::create([
            'name'=> 'Generic User',
            'email' => 'user@user.com',
            'password' => Hash::make('useruser'),
            'role_id' => 3
        ]);

    }
}
