<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
// use Illuminate\Http\Request;
// use App\Http\Requests\AuthRegisterRequest;
use App\Http\Requests\AuthRegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// use Auth;

class AuthController extends Controller
{
    public function register(AuthRegisterRequest $request)
    {
        $validateData = $request->validate();

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
            'owner_birthday' => $validateData['owner_birthday'] ,
            'image' => $validateData['image'],
            'owner_image' => $validateData['owner_image'] ,
            'introduction' => $validateData['introduction'] ,
            'url' => $validateData['url'] ,
            'twitter' => $validateData['twitter'] ,
            'facebook' => $validateData['facebook'] ,
            'instagram' => $validateData['instagram'],
            'youtube' => $validateData['youtube'] ,
            'line' => $validateData['line'] ,
            'tiktok' => $validateData['tiktok'] ,
            'pinterest' => $validateData['pinterest']
            //  ?? nullをつけることで、nullの場合はnullを代入する。
        ]);

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'access_token' => $token,
            'token_type' => 'Bearer',
        ],201);


    }
}
