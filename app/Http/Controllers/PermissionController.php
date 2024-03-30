<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    /**
     * Permissions index
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Permission::with('roles')->select('*', 'permissions.id');
            return DataTables::eloquent($model)->toJson();
        }
        return view('permissions');
    }

    /**
     * Permission store
     */
    public function store(Request $request)
    {
        if ($request->ajax()) {

            // Validation
            $error = Validator::make($request->all(), [
                'permission_name' => 'required|unique:permissions,name'
            ]);

            // Error
            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            // Create new permission
            $permission = Permission::create([
                'name'  => $request->permission_name,
            ]);

            // Every permission assign to role [admin]
            $permission->assignRole('admin');

            // Success
            return response()->json(['success' => __('New permisssion saved')]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {

            // Validation
            $error = Validator::make($request->all(), [
                'permission_name' => 'required|unique:permissions,name,' . $id
            ]);

            // Error
            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            // Update permission
            Permission::findById($id)->update([
                'name' => $request->permission_name
            ]);

            // Success
            return response()->json(['success' => 'Permission updated']);
        }
    }

    /**
     * Delete permission
     */
    public function destroy($id)
    {
        // Find permission
        $permission = Permission::findOrFail($id);

        // Error
        if ($permission == null) {
            return response()->json(['error' => 'This permission not exist']);
        }

        // Remove permission
        $permission->removeRole('admin')->delete();

        // Success
        return response()->json(['success' => __('Permission deleted')]);
    }
}
