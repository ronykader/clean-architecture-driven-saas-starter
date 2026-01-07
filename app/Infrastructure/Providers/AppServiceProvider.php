<?php

namespace App\Infrastructure\Providers;

use App\Domain\Subscription\Repositories\PlanRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\Repositories\UserRepository;
use App\Domain\User\Repositories\UserRepositoryInterface;
use App\Infrastructure\Persistence\Eloquent\Repositories\PlanRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	public function register()
	{
		$this->app->bind(UserRepositoryInterface::class, UserRepository::class);
		$this->app->bind(PlanRepositoryInterface::class, PlanRepository::class);
	}

	public function boot()
	{
		//
	}
}