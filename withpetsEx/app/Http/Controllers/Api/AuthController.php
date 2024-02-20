<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// AuthRequestを使用するために追加
use App\Http\Requests\AuthRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;

class AuthController extends Controller
{
    public function register(AuthRequest $request)
    {
        $validateData = $request->validated();

        $user = User::create([
            'owner_name' => $validateData['owner_name'],
            'name' => $validateData['name'],
            'postcode' => $validateData['postcode'],
            'prefecture' => $validateData['prefecture'],
            'city' => $validateData['city'],
            'street' => $validateData['street'],
            'building' => $validateData['building'],
            'address' => $validateData['city'].$validateData['street'].$validateData['building'].$validateData['other'],
            'tel' => $validateData['tel'],
            'email' => $validateData['email'],
            'password' => Hash::make($validateData['password']),
            'owner_birthday' => $validateData['owner_birthday'] ?? null,
            'image' => $validateData['image']?? null,
            'owner_image' => $validateData['owner_image'] ?? null,
            'introduction' => $validateData['introduction'] ?? null,
            'url' => $validateData['url'] ?? null,
            'twitter' => $validateData['twitter'] ?? null,
            'facebook' => $validateData['facebook'] ?? null,
            'instagram' => $validateData['instagram'] ?? null,
            'youtube' => $validateData['youtube'] ?? null,
            'line' => $validateData['line'] ?? null,
            'tiktok' => $validateData['tiktok'] ?? null,
            'pinterest' => $validateData['pinterest'] ?? null
            //  ?? nullをつけることで、nullの場合はnullを代入する。
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ],201);

        // return response($response, 201);
    }

    public function login(Request $request)
    {
        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details'
            ], 401);
        }

        $user = User::where('email', $request['email'])->firstOrFail();

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ]);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out'
        ]);
    }
}
