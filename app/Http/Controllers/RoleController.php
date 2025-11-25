<?php

namespace App\Http\Controllers;

use App\Models\User;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role as ModelsRole;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $role = Role::where('name', '!=', 'Super Admin')->get();
        return view('admin.management.role', compact('role'));
    }


    public function permissions() {
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:Role,name',
        ]);

        Role::create(['name' => $request->name, 'guard_name' => 'web']);
        return back()->with('success', 'Role created successfully!');
    }


    public function sync(Request $request) {
        $role = Role::findOrFail($request->role);
        $permissions = $request->input('permissions', []);
        $role->syncPermissions($permissions);
        return redirect()->back()->with('success', 'Permissions updated successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $id = decrypt($request->id);
        $role = Role::find(intval($id));
        $role->name = $request->name;
        $role->update();
        return back()->with('success', 'Role created successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $role = Role::findOrFail(decrypt($id));
        if (method_exists($role, 'permissions')) {
            $role->permissions()->detach();
        }
        $role->delete();
        return back()->with('success', 'Role deleted successfully!');
    }

    public function assignPermissions($id) {
        $id = decrypt($id);
        $role = Role::find(intval($id));
        $assignedPermissions = $role->permissions->pluck('name')->toArray();
      
        return view('admin.management.assign-permissions', compact('role', 'assignedPermissions'));
    }
}
