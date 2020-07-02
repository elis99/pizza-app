<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Repositories\User\UserRepository;

class LogoutController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function logout()
    {
        $this->userRepo->dropAuthAccessToken();

        return response(null, 200);
    }
}
