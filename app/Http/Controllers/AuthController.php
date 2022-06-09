<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $data = $request->data;
        $googleToken = $data['googleToken'];
        $deviceToken = $data['fcmToken'];
        $res = Http::get('https://oauth2.googleapis.com/tokeninfo?id_token=' . $googleToken);
        $email = $res->json()['email'];
        $user = User::where('email', $email)->first();
        if (!$user) { //user does not exist, register user
            error_log("0 exist");
            $user = AuthController::register($request, $googleToken, $deviceToken, $res);
        } else {
            error_log("exist");
        }
        $tokenResult = $user->createToken('authToken')->plainTextToken;
        if($user->device_token !== $deviceToken)
        {
            $user->update([
                'device_token' => $deviceToken
            ]);
        }
        $userController = new UserController();
        $user = $userController->getRelation($user);
        return response()->json(['user' => $user, "token" => $tokenResult]);
        } catch (\Throwable $th) {
            $th->getMessage();
        }
        
    }

    public function register(Request $request, $googleToken, $deviceToken, $res)
    {
        return User::create([
            'name' => $res->json()['name'],
            'email' => $res->json()['email'],
            'first_name' => $res->json()['family_name'],
            'last_name' => $res->json()['given_name'],
            'image_feature_path' => $res->json()['picture'],
            'google_id' => $googleToken,
            'device_token' => $deviceToken
        ]);
    }

    public function user(Request $request)
    {
        $userController = new UserController();
        $user = $userController->getRelation(auth()->user());
        return response()->json($user);
    }

    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        $request->user()->update([
            'device_token' => null
        ]);
        return response()->json([
            'message' => 'Logout'
        ], 200);
    }
}
