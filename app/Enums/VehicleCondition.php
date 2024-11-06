<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum VehicleCondition: string implements HasLabel, HasDescription, HasColor, HasIcon
{
    case New = 'Novo';
    case SemiNew = 'Seminovo';
    case Used = 'Usado';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::New => 'Novo',
            self::SemiNew => 'Seminovo',
            self::Used => 'Usado',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::New => 'Veículo novo, nunca utilizado.',
            self::SemiNew => 'Veículo em excelente estado, usado por pouco tempo.',
            self::Used => 'Veículo com histórico de uso.',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::New => 'green',
            self::SemiNew => 'yellow',
            self::Used => 'gray',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::New => 'heroicon-m-star',
            self::SemiNew => 'heroicon-m-refresh',
            self::Used => 'heroicon-m-archive',
        };
    }
}
