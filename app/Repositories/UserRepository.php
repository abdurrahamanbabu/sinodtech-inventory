<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    private $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function getByMail(string $mail): User|null
    {
        return $this->user->where('email', $mail)->first();
    }


}
