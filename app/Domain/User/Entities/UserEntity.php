<?php

namespace App\Domain\User\Entities;

class UserEntity
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly string $email,
    ) {}
}
