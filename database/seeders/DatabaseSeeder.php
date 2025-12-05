<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run()
    {
        $this->call(AdminUserSeeder::class);
        $this->call(permissionSeeder::class);
        $this->call(ViewProfileSeeder::class);
        $this->call(CoursePermissionSeeder::class);
        $this->call(SubjectPermissionSeeder::class);
    }


}
