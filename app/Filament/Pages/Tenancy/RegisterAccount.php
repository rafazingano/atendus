<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Account;
use App\Models\Plan;
use Filament\Facades\Filament;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Pages\Tenancy\RegisterTenant;

class RegisterAccount extends RegisterTenant
{
    public static function getLabel(): string
    {
        return 'Cadastro de nova conta';
    }

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('plan_id')
                    ->label('Plano')
                    ->relationship('plan', 'name')
                    ->required(),
            ]);
    }

    protected function handleRegistration(array $data): Account
    {
        $data['name'] = auth()->user()->name;

        $account = Account::create($data);

        $account->users()->attach(auth()->user());

        /*$plan = Plan::find($data['plan_id']);

        return $account
            ->newSubscription($plan->stripe_type, $plan->stripe_price)
            ->trialDays(15)
            ->allowPromotionCodes()
            ->checkout([
                'success_url' => route('filament.admin.pages.subscription-success', ['tenant' => $account]),
                'cancel_url' => route('filament.admin.pages.subscription-cancel', ['tenant' => $account]),
            ]);*/

        return $account;
    }
}
