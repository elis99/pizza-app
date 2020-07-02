<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Repositories\User\UserRepository;
class RegisterController extends Controller
{
    protected $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function register(RegisterRequest $request)
    {
        $user = $this->userRepo->create($request->validated());

        // don't send for now, current smtp server
        // doesnt send mails from external domains
        // $user->sendEmailVerificationNotification();

        return response(null, 201);
    }
}
