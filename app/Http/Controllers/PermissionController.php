<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Yajra\DataTables\Facades\DataTables;

class PermissionController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $model = Permission::with('roles')->select('*', 'permissions.id');
            return DataTables::eloquent($model)
                ->addColumn('buttons', function ($data) {
                    if (Auth::user()) {
                        $buttons = '
                        <center>
                            <button class="btn-link delete" id="' . $data->id . '" data-bs-toggle="modal" data-bs-target="#deleteModal">
                                <svg class="icon dropdown-item-icon text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                        <path d="M4 7h16"></path><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path><path d="M10 12l4 4m0 -4l-4 4"></path>
                                    </svg>
                            </button>';

                        return $buttons;
                    }
                })
                ->rawColumns(['buttons'])
                ->toJson();
        }
        return view('permissions');
    }

    public function create(Request $request)
    {
        if ($request->ajax()) {

            $error = Validator::make($request->all(), [
                'permission_name' => 'required|unique:permissions,name,'
            ]);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            Permission::create([
                'name'  => $request->permission_name,
            ]);
            return response()->json(['success' => __('Permisssion saved')]);
        }
    }

    public function destroy($id)
    {
        $permission = Permission::find($id);
        $permission->delete();
        return response()->json(['success' => __('Permission deleted')]);
    }
}
