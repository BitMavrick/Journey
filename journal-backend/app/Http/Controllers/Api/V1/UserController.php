<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\V1\UserResource;
use App\Http\Resources\V1\UserCollection;
use App\Http\Requests\V1\StoreUserRequest;
use App\Http\Requests\V1\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        return new UserCollection(User::paginate(5));
    }

    public function store(StoreUserRequest $request)
    {
        $user = new UserResource(User::create($request->all()));

        if ($user) {
            return response()->json([
                'data' => $user,
                'message' => 'User created successfully'
            ], 201);
        }
    }

    public function show(User $user)
    {
        return new UserResource($user);
    }

    public function update(UpdateUserRequest $request, User $user)
    {
        $user->update($request->all());

        if ($user) {
            return response()->json([
                'data' => $user,
                'message' => 'User updated successfully'
            ], 200);
        }
    }

    public function destroy(User $user)
    {
        $user->delete();

        if ($user) {
            return response()->json([
                'data' => $user,
                'message' => 'User deleted successfully'
            ], 200);
        }
    }
}
