<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();

        return response()->json(['users' => $users], 200);
    }

    public function store(UserRequest $request)
    {
        $input = $request->validated();

        $user = User::create([
            'name' => $input['name'],
            'phone' => $input['phone']
        ]);

        if(!$user) {
            return response()->json(['message' => 'Could not create user'], 404);
        }

        return response()->json(['user' => $user], 201);
    }

    public function show(Request $request)
    {
        $user = User::find($request->id);

        if(!$user) {
            return response()->json(['message' => 'Not found'], 404);
        }

        return response()->json(['user' => $user], 200);
    }

    public function edit(Request $request)
    {
        $data = [
            'name' => $request->name,
            'phoene' => $request->phoene
        ];

        $update = User::where('id', $request->id)->update($data);

        if(!$update) {
            return response()->json(['message' => 'Could not update user'], 404);
        }

        return reponse()->json(['message' => 'User updated successfully'], 200);
    }

    public function destroy(Request $request)
    {
        $user = User::where('id', $request->id)->delete();

        if(!$user) {
            return response()->json(['message' => 'Could not delete user'], 404);
        }

        return response()->json(['message' => 'User deleted successfully'], 200);
    }
}
