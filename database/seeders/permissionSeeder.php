<?php


namespace Database\Seeders;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class permissionSeeder extends Seeder
{
    public function run()
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        Permission::create(['name' => 'add teacher']);
        Permission::create(['name' => 'view teacher']);
        Permission::create(['name' => 'edit teacher']);
        Permission::create(['name' => 'delete teacher']);

        Permission::create(['name' => 'add student']);
        Permission::create(['name' => 'view student']);
        Permission::create(['name' => 'edit student']);
        Permission::create(['name' => 'delete student']);

        permission::create(['name' => 'view role']);

        $role = Role::create(['name' => 'Super Admin']);

        $role->givePermissionTo(Permission::all());

        $user = User::find(1);
        $user->assignRole([$role->id]);
    }
}
