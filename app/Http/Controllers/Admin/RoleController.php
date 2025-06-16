<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $pageTitle = 'Roles';
        $roles = Role::where('guard_name', 'web')->paginate(20);
        return view('admin.settings.roles.index', compact('pageTitle', 'roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:50'],
            'guard_name' => ['required', 'string', 'max:20'],
        ]);
        $role = Role::create($request->all());
        $role->save();
        return redirect()->back();
    }
    public function edit($id)
    {
        $role = Role::findOrFail($id);
        if ($role->name == 'Superuser') {
            return redirect()->back();
        }
        $pageTitle = "Editing Role " . $role->name;
        $roles = Role::where('guard_name', 'web')->paginate(20);
        return view('admin.settings.roles.index', compact('pageTitle', 'role', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:50'],
            'guard_name' => ['required', 'string', 'max:20'],
        ]);
        Role::findOrFail($id)->update($request->except('_token', '_method'));
        return redirect()->route('roles.index');
    }

    public function destroy($id)
    {
        $data = Role::findOrFail($id);
        if ($data->name == 'Superuser') {
            return redirect()->back();
        }
        $data->delete();
        return response()->json($data);
    }

    public function givePermission($roleId)
    {
        $role = Role::find(($roleId));
        if ($role->name == 'Superuser') {
            return redirect()->back();
        }
        $pageTitle = "Assigning Permission to " . "(" . $role->name . ")";
        $permissions = Permission::where('guard_name', 'web')->get();

        return view('admin.settings.roles.assign-permissions', compact('role', 'permissions', 'pageTitle'));
    }

    public function saveAssignedPermission(Request $request, $roleId)
    {
        $role = Role::find($roleId);
        if ($role->name == 'Superuser') {
            return redirect()->back();
        }
        $role->syncPermissions($request->permissions);

        $users = $role->users()->get();
        foreach ($users as $user) {
            $user->syncPermissions($request->permissions);
        }
        return redirect()->route('roles.index');
    }
}
