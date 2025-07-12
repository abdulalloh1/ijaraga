<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/**
 * @OA\Tag(
 *     name="Auth",
 *     description="Аутентификация и регистрация"
 * )
 * @OA\PathItem(
 *     path="/api"
 * )
 */

class AuthController extends Controller
{
}
