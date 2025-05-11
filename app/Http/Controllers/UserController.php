<?php

namespace App\Http\Controllers;

use App\Actions\Fortify\PasswordValidationRules;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    use PasswordValidationRules;

    public function index(Request $request)
    {
        $roles       = Role::all();
        $permissions = Permission::all();

        if ($request->ajax()) {
            $model = User::with('roles', 'permissions')->select('*', 'users.id');
            return DataTables::eloquent($model)->toJson();
        }
        return view('users', compact('roles', 'permissions'));
    }

    public function store(Request $request)
    {
        if ($request->ajax()) {

            $error = Validator::make($request->all(), [
                'name' => 'required',
                'email' => [
                    'required',
                    'string',
                    'email',
                    'max:50',
                    Rule::unique(User::class)
                ],
                'password' => $this->passwordRules(),
            ]);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            User::create([
                'name'     => $request->name,
                'email'    => $request->email,
                'password' => bcrypt($request->password)
            ])->syncPermissions($request['permissions'])->syncRoles($request['roles']);

            return response()->json(['success' => __('User saved')]);
        }
    }

    public function update(Request $request, $id)
    {
        if ($request->ajax()) {

            $error = Validator::make($request->all(), [
                'name'  => 'required',
                'email' => 'required|string|email|unique:users,email,' . $request->id
            ]);

            if ($error->fails()) {
                return response()->json(['errors' => $error->errors()->all()]);
            }

            $user = User::find($id);
            $user->update([
                'name'  => $request->name,
                'email' => $request->email
            ]);

            $user->syncPermissions($request['permissions'])->syncRoles($request['roles']);

            return response()->json(['success' => __('User updated')]);
        }
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['success' => __('User deleted')]);
    }
}
