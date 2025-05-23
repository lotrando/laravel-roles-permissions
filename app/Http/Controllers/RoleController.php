<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $permissions = Permission::orderBy('name')->get();
        if ($request->ajax()) {
            $model = Role::with('permissions', 'users')->where('id', '>', 1)->select('*', 'roles.id');
            return DataTables::eloquent($model)
                ->addColumn('buttons', function ($data) {
                    if (Auth::user()) {
                        $buttons = '
                        <center>
                            <button class="btn-link delete" id="' . $data->id . '">
                                <svg class="icon dropdown-item-icon text-red" width="24" height="24" viewBox="0 0 24 24" stroke-width="5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                    <path d="M4 7h16"></path><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                    <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path><path d="M10 12l4 4m0 -4l-4 4"></path>
                                </svg>
                                {{ __("Delete" }}
                            </button>
                        </center>
                        ';

                        return $buttons;
                    }
                })
                ->rawColumns(['buttons'])
                ->toJson();
        }
        return view('roles', ['permissions' => $permissions]);
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {

            $error = Validator::make($request->all(), [
                'role_name' => 'required|unique:roles,name',
            ]);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            Role::create(['name' => $request->role_name])->givePermissionTo($request['permissions']);

            return response()->json(['success' => __('Role saved')]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {

            $error = Validator::make($request->all(), [
                'role_name' => 'required|unique:roles,name,' . $id
            ]);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $role = Role::findById($id);
            $role->syncPermissions($request['permissions'])->update(['name' => $request->role_name]);
            return response()->json(['success' => __('Role updated')]);
        }
    }

    public function destroy($id)
    {
        $permission = Role::find($id);
        $permission->delete();
        return response()->json(['success' => __('Role deleted')]);
    }
}
