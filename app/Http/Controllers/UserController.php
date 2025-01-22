<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\DeleteUserRequest;
use App\Http\Requests\User\GetAllUsersRequest;
use App\Http\Requests\User\GetOneUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function update(UpdateUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->name = $request->input('name');
        $user->email = $request->input('email');

        if ($request->filled('password')) {
            $user->password = Hash::make($request->input('password'));
        }

        $user->role = $request->input('role');

        $user->save();

        return response()->json([
            'message' => 'User updated successfully.',
            'user' => $user
        ], 200);
    }

    public function destroy(DeleteUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully.'
        ], 200);
    }

    public function index(GetAllUsersRequest $request)
    {
        $users = User::orderBy('created_at', "desc")->paginate(10);

        return response()->json($users);
    }

    public function show(GetOneUserRequest $request, $id)
    {
        $user = User::findOrFail($id);

        return response()->json($user);
    }
}
