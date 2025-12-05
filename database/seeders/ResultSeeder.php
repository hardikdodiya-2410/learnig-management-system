<?php


namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

use Illuminate\Database\Seeder;

class ResultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'add marks']);
        Permission::create(['name' => 'edit marks']);
        Permission::create(['name' => 'delete marks']);
        Permission::create(['name' => 'view all results']);
        Permission::create(['name' => 'view own result']);

           $student = Role::findByName('Student');
           $student->givePermissionTo('view own result');   
    }
}
