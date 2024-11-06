<?php

namespace App\Providers\Filament;

use App\Http\Middleware\RedirectIfUserNotSubscribed;
use Filament\Billing\Providers\Contracts\Provider;
use Illuminate\Http\RedirectResponse;
use Closure;
use Filament\Facades\Filament;

class TenantsProvider implements Provider
{
    public function getRouteAction(): string | Closure | array
    {
        return function (): RedirectResponse {
            return redirect()->route('filament.admin.pages.subscription-manager', ['tenant' => Filament::getTenant()]);
        };
    }

    public function getSubscribedMiddleware(): string
    {
        return RedirectIfUserNotSubscribed::class;
    }
}
