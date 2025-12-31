<?php

namespace App\Application;

use App\Application\Auth\DTOs\RegisteruserDTO;
use App\Domain\User\Repositories\UserRepositoryInterface;

class RegisterUserUseCase
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        private UserRepositoryInterface $users,
    )
    {}
    public function execute(RegisteruserDTO $dto)
    {
        return $this->users->create(
            $dto->name,
            $dto->email,
            $dto->password,
        );
    }
}
