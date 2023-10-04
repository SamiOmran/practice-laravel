<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\StoreUserRequest;
use App\Services\UserServices;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Response;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(StoreUserRequest $request, UserServices $service): Response
    {
        $user = $service->storeUser($request->toDTO());

        event(new Registered($user));

        auth()->login($user);

        return response()->noContent();
    }
}
