<?php
namespace App\Services;

use App\Repositories\UserRepository;

class UserService {
    protected UserRepository $userRepo;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function getByMail(string $mail)
    {
        return $this->userRepo->getByMail($mail);
    }
}
