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
        return auth()->attempt($credentials, $remember);
    }

    public function logout()
    {
        auth()->logout();
    }

}