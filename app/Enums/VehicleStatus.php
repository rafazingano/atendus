<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum VehicleStatus: string implements HasLabel, HasDescription, HasColor, HasIcon
{
    case Available = 'Disponível';
    case Sold = 'Vendido';
    case InMaintenance = 'Em Manutenção';
    case Reserved = 'Reservado';
    case UnderInspection = 'Em Inspeção';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Available => 'Disponível',
            self::Sold => 'Vendido',
            self::InMaintenance => 'Em Manutenção',
            self::Reserved => 'Reservado',
            self::UnderInspection => 'Em Inspeção',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::Available => 'Veículo disponível para venda.',
            self::Sold => 'Veículo já vendido.',
            self::InMaintenance => 'Veículo em manutenção.',
            self::Reserved => 'Veículo reservado para um cliente.',
            self::UnderInspection => 'Veículo em processo de inspeção.',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Available => 'green',
            self::Sold => 'gray',
            self::InMaintenance => 'yellow',
            self::Reserved => 'blue',
            self::UnderInspection => 'orange',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Available => 'heroicon-m-check-circle',
            self::Sold => 'heroicon-m-x-circle',
            self::InMaintenance => 'heroicon-m-wrench',
            self::Reserved => 'heroicon-m-bookmark',
            self::UnderInspection => 'heroicon-m-eye',
        };
    }
}
