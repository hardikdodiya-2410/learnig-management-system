<?php

namespace Database\Seeders;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class ViewProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        Permission::create(['name' => 'view Profile']);
        Permission::create(['name' => 'edit Profile']);
        
    }  
}
