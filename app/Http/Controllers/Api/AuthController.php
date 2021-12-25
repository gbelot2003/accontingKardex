<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function logout()
    {
        auth('api')->user()->tokens->each(function ($token, $key) {
            $token->delete();
        });

        return response()->json('Logged out', 200);
    }

    public function login(Request $request)
    {

        $request->validate([
            'email'     =>  'email|required',
            'password'  =>  'required'
        ]);

        $credentials = $request->only('email', 'password');

        $checkStatus = User::where('email', $request->email)->first();

        if (auth()->attempt($credentials)) {
            return $this->authAttemps($request);
        } else {
            return response(['message' => 'invalid credentials']);
        }
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    private function authAttemps(Request $request): \Illuminate\Http\JsonResponse
    {
        //Pasa la autenticaciòn...

        //reset failed login attemps
        //$this->clearLoginAttempts($request);

        $user = $request->user();
        $tokenResult = $user->createToken('Personal Access Token');
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);

        $token->save();

        return response()->json([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse($tokenResult->token->expires_at)->toDateTimeString()
        ]);
    }
}
