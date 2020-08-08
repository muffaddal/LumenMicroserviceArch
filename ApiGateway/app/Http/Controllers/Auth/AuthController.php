<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Carbon;

class AuthController extends Controller
{
    use ApiResponser;

    /**
     * @param Request $request
     * @return AuthController
     */
    public function login(Request $request)
    {
        //Login user after validation
    }

    /**
     * @param Request $request
     * @return AuthController
     * @throws ValidationException
     */
    public function register(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string',
            'email' => 'required|string|email|unique:user',
            'password' => 'required|string|confirmed'
        ]);

        $user = new User([
            'name' => $request->name,
            'email' => $request->email,
            'password' => app('hash')->make($request->password),

        ]);

        $user->save();

        $tokenResult = $user->createToken('Personal Access Token');

        return $this->successResponse([
            'access_token' => $tokenResult->accessToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ], Response::HTTP_OK);
    }
}
