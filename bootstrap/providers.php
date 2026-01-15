<?php

use App\Infrastructure\Providers\AppServiceProvider;

return [
    App\Providers\AppServiceProvider::class,
    App\Providers\FortifyServiceProvider::class,
    AppServiceProvider::class,
];
