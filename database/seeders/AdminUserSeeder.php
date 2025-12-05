<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    public function run()
    {
        $user = User::create([
            'name' => 'Super Admin', 
            'email' => 'superadmin@gmail.com',
            'password' => bcrypt('admin@123')
        ]);

       
       
    }
}
