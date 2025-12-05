<?php

namespace App\Http\Controllers\Role;

use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;
class RoleController extends Controller
{
        public function create()
        {
            $permissions = Permission::orderBy('name')->get();
            return view('admin.addrole', compact('permissions'));
        }
        public function index()
        {
            $roles = Role::with('permissions')->paginate(2);
            return view('admin.viewrole', compact('roles'));
        }
        public function store(Request $request)
        {
            $request->validate([
            'role_name' => 'required|string|max:255',
            'permissions' => 'required|array|min:1',
            'permissions.*' => 'string|exists:permissions,name',

            ]);
            $role = Role::create(['name' => $request->role_name]);
            $role->syncPermissions($request->permissions);
            flash()->option('position', 'top-right')->success('Role created successfully!');
            return redirect()->route('admin.viewrole');
        }
        public function edit($id)
        {
            $role = Role::find($id);
            $permissions = Permission::orderBy('name')->get();
            return view('admin.editrole', compact('role', 'permissions'));
        }
        public function update(Request $request, $id)
        {
            $request->validate([
                'name' => 'required|string|max:255',
                'permissions' => 'required|array|min:1',
                'permissions.*' => 'exists:permissions,name',
            ], [
                'permissions.required' => 'Please select at least one permission.',
                'permissions.min' => 'Please select at least one permission.',
            ]);
            $role = Role::findOrFail($id);
            $role->name = $request->input('name');
            $role->save();

            $role->syncPermissions($request->input('permissions'));
            flash()->option('position', 'top-right')->success('Role updated successfully!');
            return redirect()->route('admin.viewrole');
        }
        public function destroy($id)
        {
            $role = Role::find($id);
            $role->delete();
            flash()->option('position', 'top-right')->success('Role deleted successfully!');
            return redirect()->route('admin.viewrole');
        }
}

