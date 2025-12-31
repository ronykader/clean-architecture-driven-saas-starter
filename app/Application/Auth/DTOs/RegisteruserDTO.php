<?php

namespace App\Application\Auth\DTOs;

class RegisteruserDTO
{
    /**
     * Create a new class instance.
     */
    public function __construct(
        public readonly string $name,
        public readonly string $email,
        public readonly string $password,
    )
    {}
}
