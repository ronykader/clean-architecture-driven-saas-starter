<?php

namespace App\Infrastructure\Providers;

use App\Infrastructure\Persistence\Eloquent\Repositories\UserRepository;
use App\Domain\User\Repositories\UserRepositoryInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind(UserRepositoryInterface::class, UserRepository::class);
	}

	public function boot()
	{
		//
	}
}