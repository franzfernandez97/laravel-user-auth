<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Exception;

class UserTokenController extends Controller
{
    public function getUsers(): JsonResponse
    {
        try{
        if (Auth::check() && Auth::user()->role === 'admin') {
            $users = User::all(); 
            return response()->json([
                'message' => 'Lista de usuarios',
                'users' => $users
            ], 200);
        }

        return response()->json([
            'error' => 'No autorizado',
            'message' => 'Solo los administradores pueden ver la lista de usuarios.'
        ], 403); // 403 Forbidden

    } catch (Exception $error) {
        return response()->json([
            'error' => 'Error en la obtención de usuarios: '.$error->getMessage()
        ], 500); // 500 Internal Server Error
    }
    }
}

?>