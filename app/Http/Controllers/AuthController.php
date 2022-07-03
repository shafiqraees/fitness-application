<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * @param LoginRequest $request
     * @return UserResource|JsonResponse
     */
    public function login(LoginRequest $request) {

        try {
            $credentials = $request->only('email', 'password');
            if (Auth::attempt($credentials)) {
                $data = auth()->user();
                $data['token'] = $data->createToken('token')->plainTextToken;
                return  UserResource::make($data);
            }
            return response()->json(['error' => 'Invalid credentials'], JsonResponse::HTTP_NOT_FOUND);
        } catch (\Exception $exception) {
            report($exception);
            return response()->json(['error' => 'Oops! something went wrong please try again later'], JsonResponse::HTTP_INTERNAL_SERVER_ERROR);
        }
    }
}
