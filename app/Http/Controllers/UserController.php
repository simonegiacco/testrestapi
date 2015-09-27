<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * Register new user
     */
    public function register(Requests\RegisterRequest $request)
    {
        $user = $this->userRepository->store($request->all());

        auth()->login($user);

        return success($user, 'User registered successfully.');
    }

    /*
     * Login user
     */
    public function login(Requests\LoginRequest $request)
    {
        $credentials = $request->only(['username', 'password']);

        if (auth()->attempt($credentials, $request->has('remember'))) {
            return success(auth()->user(), 'User logged in successfully.');
        }

        return error(UNAUTHORIZED, 'Unauthorized, These credentials do not match our records.');
    }

    /*
     * Logout user
     */
    public function logout()
    {
        auth()->logout();

        return success(null, 'User logged out successfully.');
    }
}
