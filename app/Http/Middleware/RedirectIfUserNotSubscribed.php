<?php

namespace App\Http\Middleware;

use Closure;
use Filament\Facades\Filament;
use Illuminate\Http\Request;

class RedirectIfUserNotSubscribed
{
    public function handle(Request $request, Closure $next)
    {

        $account = Filament::getTenant();


        if ($request->routeIs('filament.admin.pages.subscription-manager')) {
            return $next($request);
        }

        if (!Filament::getTenant()->subscribed($account->plan->stripe_type)) {
            return redirect()->route('filament.admin.tenant.billing', ['tenant' => Filament::getTenant()]);
        }

        return $next($request);
    }
}
