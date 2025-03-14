<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Http\JsonResponse;

class AuthenticatedTokenController extends Controller
{
    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): JsonResponse
    {
        try {
            $request->authenticate();

            $user = $request->user();
            $user->tokens()->delete();

            $token = $user->createToken('auth_token', ['*'], now()->addHours(1))->plainTextToken;

            $tokenParts = explode('|', $token);
            $cleanToken = $tokenParts[1] ?? $token;

            return response()->json([
                'user' => $user,
                'token' => $cleanToken
            ], 200);
        }catch (Exception $error) {
            return response()->json([
                'error'=> 'Error al iniciar sesión: '.$error
            ], 500);
        }
    }

    public function destroy(Request $request): JsonResponse
    {
        try {

            if ($request->user()) {
                $request->user()->tokens()->delete();
            }

            Auth::guard('web')->logout();

            return response()->json([
                'message' => 'Sesión cerrada correctamente'
            ], 200);
        } catch (Exception $error) {
            return response()->json([
                'error' => 'Error al cerrar sesión: '.$error->getMessage()
            ], 500);
        }
    }
}
