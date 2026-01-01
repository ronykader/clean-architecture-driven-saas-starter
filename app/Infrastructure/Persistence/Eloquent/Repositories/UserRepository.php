<?php

namespace App\app\Infrastructure\Persistence\Eloquent\Repositories;

use App\Domain\User\Entities\UserEntity;
use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Models\app\Infrastructure\Persistence\Eloquent\Models\User;
use Illuminate\Support\Facades\Hash;

class UserRepository implements UserRepositoryInterface
{
    public function create(string $name, string $email, string $password): UserEntity
    {
        $user = User::create([
            'name' => $name,
            'email' => $email,
            'password' => Hash::make($password),
        ]);
        
        return new UserEntity(
            id: $user->id,
            name: $user->name,
            email: $user->email,
        );
    }
}