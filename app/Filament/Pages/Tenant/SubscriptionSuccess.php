<?php

namespace App\Filament\Pages\Tenant;

use Filament\Pages\Page;
use Filament\Notifications\Notification;

class SubscriptionSuccess extends Page
{
    protected static string $view = 'filament.pages.tenant.subscription-success';
    protected static ?string $slug = 'subscription-success';
    protected static bool $shouldRegisterNavigation = false;

    public function mount(): void
    {
        $tenant = filament()->getTenant();
        
        if ($tenant->subscribed('zingano')) {
            Notification::make()
                ->title('Subscription activated!')
                ->body('Your subscription has been successfully activated.')
                ->success()
                ->send();
        }
    }
}