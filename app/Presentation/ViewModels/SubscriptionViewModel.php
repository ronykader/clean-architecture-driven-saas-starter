<?php

namespace App\Presentation\ViewModels;

class SubscriptionViewModel
{
    public function __construct(
        public int $id,
        public string $planName,
        public string $status,
        public ?string $startedAt,
        public ?string $endedAt,
    ) {}
}
