<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum FuelType: string implements HasLabel, HasDescription, HasColor, HasIcon
{
    case Gasoline = 'Gasolina';
    case Diesel = 'Diesel';
    case Electric = 'Elétrico';
    case Flex = 'Flex';
    case Alcohol = 'Álcool';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Gasoline => 'Gasolina',
            self::Diesel => 'Diesel',
            self::Electric => 'Elétrico',
            self::Flex => 'Flex',
            self::Alcohol => 'Álcool',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::Gasoline => 'Veículo movido a gasolina.',
            self::Diesel => 'Veículo movido a diesel.',
            self::Electric => 'Veículo movido a eletricidade.',
            self::Flex => 'Veículo com tecnologia Flex (gasolina/álcool).',
            self::Alcohol => 'Veículo movido a álcool.',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Gasoline => 'blue',
            self::Diesel => 'gray',
            self::Electric => 'green',
            self::Flex => 'yellow',
            self::Alcohol => 'red',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Gasoline => 'heroicon-m-fire',
            self::Diesel => 'heroicon-m-oil',
            self::Electric => 'heroicon-m-bolt',
            self::Flex => 'heroicon-m-switch-horizontal',
            self::Alcohol => 'heroicon-m-droplet',
        };
    }
}
