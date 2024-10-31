<?php

namespace App\Filament\Pages\Tenancy;

use App\Models\Account;
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
        $team = Account::create($data);

        $team->members()->attach(auth()->user());

        return $team;
    }
}
