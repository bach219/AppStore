<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterFormRequest;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;
use Illuminate\Http\Response;
use App\Client;
use App\Http\Requests\RegisterClientRequest;
use App\Http\Requests\LoginClientRequest;
use Illuminate\Support\Facades\Hash;
use Config;
use JWTAuthException;
class ApiController extends Controller
{
    public function register(RegisterClientRequest $request)
    {
        if ($request['password'] != $request['passwordVerify']) {
                return response()->json('error', Response::HTTP_BAD_REQUEST);
            }
                $client = Client::create([
                            'name' => $request['name'],
                            'email' => $request['email'],
                            'password' => Hash::make($request['password']),
                            'phone' => $request['phone'],
                            'address' => $request['address'],
                            'sex' => $request['sex']
                ]);
        
        return response()->json([
            'client' => $client
        ], Response::HTTP_OK);
    }

    public function login(LoginClientRequest $request)
    {
        $credentials = ['email' => $request['email'], 'password' => $request['password']];
        if (!($token = auth('api')->attempt($credentials))) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid Email or Password',
            ], Response::HTTP_BAD_REQUEST);
        }
        
        
        return response()->json([
            'token' => $token,
            'client' => auth('api')->user(),
            'expired' => auth('api')->factory()->getTTL() * 60 * 60 * 30
        ], Response::HTTP_OK);
    }

    public function client(Request $request)
    {
        $client = auth('api')->user();

        if ($client) {
            return response($client, Response::HTTP_OK);
        }

        return response(null, Response::HTTP_BAD_REQUEST);
    }

    /**
     * Log out
     * Invalidate the token, so user cannot use it anymore
     * They have to relogin to get a new token
     *
     * @param Request $request
     */
    public function logout(Request $request) {
        
        //  $this->validate($request, ['token' => 'required']);
        
        try {
            auth('api')->invalidate();
            return response()->json('You have successfully logged out.', Response::HTTP_OK);
        } catch (JWTException $e) {
            return response()->json('Failed to logout, please try again.', Response::HTTP_BAD_REQUEST);
        }
    }

    public function refresh()
    {
        return response(JWTAuth::getToken(), Response::HTTP_OK);
    }
}
