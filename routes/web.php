<?php

use App\Http\Controllers\ChatController;
use App\Models\Account;
use Filament\Facades\Filament;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/subscription-checkout', function (Request $request) {
    return Filament::getTenant()
        ->newSubscription('zingano', 'price_1QHAUvJhbkDaayMYoZXXCPXL')
        ->trialDays(5)
        ->allowPromotionCodes()
        ->checkout([
            'success_url' => route('filament.admin.pages.subscription-success', ['tenant' => Filament::getTenant()]),
            'cancel_url' => route('filament.admin.pages.subscription-cancel', ['tenant' => Filament::getTenant()]),
        ]);
})->name('subscription.checkout');