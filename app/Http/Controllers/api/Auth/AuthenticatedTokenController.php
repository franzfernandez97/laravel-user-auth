<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Exception;
use Illuminate\Http\JsonResponse;

class AuthenticatedTokenController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

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

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        $request->user()->tokens()->delete();
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        //return redirect('login');
    }
}
