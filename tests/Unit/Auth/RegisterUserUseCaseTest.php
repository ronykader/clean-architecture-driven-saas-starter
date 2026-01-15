<?php

use App\Application\Auth\DTOs\RegisteruserDTO;
use App\Application\Auth\RegisterUserUseCase;
use App\Domain\User\Entities\UserEntity;
use App\Domain\User\Repositories\UserRepositoryInterface;

it('registers a user via use case', function () {

    $fakeRepo = new class implements UserRepositoryInterface
    {
        public function create(string $name, string $email, string $password): ?UserEntity
        {
            return new UserEntity(1, $name, $email);
        }
    };

    $useCase = new RegisterUserUseCase($fakeRepo);
    $user = $useCase->execute(
        new RegisteruserDTO('Rony', 'rony@test.com', 'secret123')
    );
    expect($user)
        ->toBeInstanceOf(UserEntity::class)
        ->and($user->email)->toBe('rony@test.com')
        ->and($user->name)->toBe('Rony');
});
