<?php

namespace App\Repositories;

use App\User;

class UserRepository extends Repository
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function store(array $attributes = [])
    {
        $user = parent::store($attributes);

        auth()->login($user);

        return $user;
    }

    public function login($credentials, $remember = false)
    {
        $credentialsWithEmail = [
            'email' => $credentials['username'],
            'password' => $credentials['password'],
        ];

        if(auth()->attempt($credentials, $remember)) {
            return true;
        } elseif(auth()->attempt($credentialsWithEmail, $remember)) {
            return true;
        } else {
            return false;
        }
    }

    public function logout()
    {
        auth()->logout();
    }

}