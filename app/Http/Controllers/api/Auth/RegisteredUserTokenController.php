<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Exception;
use Illuminate\Http\JsonResponse;

class RegisteredUserTokenController extends Controller
{
    public function store(Request $request): JsonResponse
    {
        try {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'birth_date' => ['required', 'date'],
            'gender' => ['required', 'in:F,M'],
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error' => 'Validation failed',
                'message' => $validator->errors()
            ], 422);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'birth_date' => $request->birth_date,
            'gender' => $request->gender
        ]);

        event(new Registered($user));

        Auth::login($user);

        return response()->json([
            'message' => 'Usuario registrado y autenticado con éxito.',
            'user' => $user
        ], 201); 

    } catch (Exception $error) {
        return response()->json([
            'error' => 'Error en el registro: '.$error->getMessage()
        ], 500); 
    }
    }
}
