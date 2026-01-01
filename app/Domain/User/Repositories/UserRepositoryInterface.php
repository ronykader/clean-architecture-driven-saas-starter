<?php

namespace App\Domain\User\Repositories;

use App\Domain\User\Entities\UserEntity;

interface UserRepositoryInterface
{
    public function create(string $name, string $email, string $password): ?UserEntity;
}
