<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\User\{
    DestroyUserRequest,
    IndexUserRequest,
    ShowUserRequest,
    StoreUserRequest,
    UpdateUserRequest,
};
use App\Http\Resources\API\User\{
    ListUsersResource,
    ShowUserResource,
};
use App\Models\User;
use App\Services\UserServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserController extends APIController
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexUserRequest $request, UserServices $service): JsonResource
    {
        $data = $service->getUsers($request->toDTO());

        return ListUsersResource::collection($data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request, UserServices $service): JsonResource
    {
        $user = $service->storeUser($request->toDTO());

        return new ShowUserResource($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(ShowUserRequest $request, User $user, UserServices $service): JsonResource
    {
        $user = $service->showUser($user);

        return new ShowUserResource($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user, UserServices $service): JsonResponse
    {
        $updated = $service->updateUser($user, $request->toDTO());

        if ($updated) {
            return response()->json([
                'message' => 'User updated successfully',
                'status' => '200',
                'data' => new ShowUserResource($user),
            ]);
        }

        return response()->json([
            'message' => 'Error occuered while updating user',
            'status' => '500',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestroyUserRequest $request, User $user, UserServices $service): JsonResponse
    {
        $destroyed = $service->destroyUser($user);

        if ($destroyed) {
            return response()->json([
                'message' => 'User deleted successfully',
                'status' => '200',
            ]);
        }

        return response()->json([
            'message' => 'Error occuered while deleting user',
            'status' => '500',
        ]);
    }

    public function numberArticels(Request $request, User $user): JsonResponse
    {
        $count = $user->articles_count;

        return response()->json([
            'message' => 'Articles count returned successfully',
            'status' => 200,
            'data' => [
                'Articles Count' => $count
            ]
        ]);
    }

}
