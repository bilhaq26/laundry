<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\UserRole;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        UserRole::create(['name' => 'Developer']);
        UserRole::create(['name' => 'Super Admin']);
        UserRole::create(['name' => 'Admin']);

        User::create([
            'fullname' => 'Developer',
            'firstname' => 'Developer',
            'lastname' => '',
            'username' => 'developer',
            'email' => 'developer@email.com',
            'password' => bcrypt('password'),  
            'photo' => 'developer.png',
            'is_admin' => '1',
            'role_id' => 1,
            'user_status' => 'active',
        ]);

        User::create([
            'fullname' => 'Super Admin',
            'firstname' => 'Super',
            'lastname' => 'Admin',
            'username' => 'superadmin',
            'email' => 'super@email.com',
            'password' => bcrypt('password'),  
            'photo' => 'superadmin.png',
            'is_admin' => 'true',
            'role_id' => 2,
            'user_status' => 'active',
        ]);

        User::create([
            'fullname' => 'Admin',
            'firstname' => 'Admin',
            'lastname' => '',
            'username' => 'admin',
            'email' => 'admin@email.com',
            'password' => bcrypt('password'),  
            'photo' => 'admin.png',
            'is_admin' => 'true',
            'role_id' => 3,
            'user_status' => 'active',
        ]);
    }
}
