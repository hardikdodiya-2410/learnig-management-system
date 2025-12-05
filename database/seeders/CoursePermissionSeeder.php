<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;


class CoursePermissionSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
         Permission::create(['name' => 'add course']);
         Permission::create(['name' => 'view course']);
         Permission::create(['name' => 'edit course']);
         Permission::create(['name' => 'delete course']);

            $student = Role::findByName('Student');
            $student->givePermissionTo('view course');
    }
}
