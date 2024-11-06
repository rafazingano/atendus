<?php

namespace App\Filament\Pages\Tenant;

use Filament\Pages\Page;
use Filament\Notifications\Notification;

class SubscriptionCancel extends Page
{
    protected static string $view = 'filament.pages.tenant.subscription-cancel';
    protected static ?string $slug = 'subscription-cancel';
    protected static bool $shouldRegisterNavigation = false;

    public function mount(): void
    {
        $tenant = filament()->getTenant();
    }
}