<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Permission::with('roles')->select('*');
            return DataTables::eloquent($model)->toJson();
        }
        return view('permissions');
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {

            $rules = [
                'permission_name' => 'required|unique:permissions,name,'
            ];

            $error = Validator::make($request->all(), $rules);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            Permission::create([
                'name'  => $request->permission_name,
            ]);

            return response()->json(['success' => 'Permission saved']);
        }
    }
}
