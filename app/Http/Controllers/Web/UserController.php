<?php

namespace App\Http\Controllers\Web;

use App\Http\Requests\Web\LoginRequest;
use App\Http\Requests\Web\RegisterRequest;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    private $userRepository;

    private $redirectPath = '/';

    private $loginPath = 'login';

    public function __construct(UserRepository $userRepository)
    {
        $this->middleware('guest', ['only' => ['getLogin', 'getRegister', 'login', 'register']]);

        $this->userRepository = $userRepository;
    }

    public function getRegister()
    {
        return view('auth.register');
    }

    /**
     * Register new user
     */
    public function register(RegisterRequest $request)
    {
        $user = $this->userRepository->store($request->all());

        return redirect($this->redirectPath);
    }

    public function getLogin()
    {
        return view('auth.login');
    }

    /*
     * Login user
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only(['username', 'password']);

        if ($this->userRepository->login($credentials, $request->has('remember'))) {
            return redirect()->intended($this->redirectPath);
        }

        return redirect($this->loginPath)
            ->withInput($request->only('username', 'remember'))
            ->withErrors([
                'username' => 'These credentials do not match our records.',
            ]);
    }

    /*
     * Logout user
     */
    public function logout()
    {
        $this->userRepository->logout();

        return redirect($this->redirectPath);
    }

    public function getProfile($username)
    {
        return view('users.profile');
    }
}
