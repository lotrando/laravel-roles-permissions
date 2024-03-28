<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class UserController extends Controller
{
    public function index(Request $request)
    {
        // return $model;
        if ($request->ajax()) {
            $model = User::with('roles', 'permissions')->select('*', 'users.id');
            return DataTables::eloquent($model)->toJson();
        }
        return view('users');
    }

    public function indexGrouped()
    {
        $groupedUsers = User::orderBy('name')->get()->groupBy(function ($item) {
            return $item->name[0];
        });
        $groupedUsers->sortBy(function ($key) {
            return $key;
        });
        return view('users', ['users' => $groupedUsers]);
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return response()->json(['success' => __('Permission deleted')]);
    }
}
