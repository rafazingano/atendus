<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum TransmissionType: string implements HasLabel, HasDescription, HasColor, HasIcon
{
    case Manual = 'Manual';
    case Automatic = 'Automático';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Manual => 'Manual',
            self::Automatic => 'Automático',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::Manual => 'Veículo com transmissão manual.',
            self::Automatic => 'Veículo com transmissão automática.',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Manual => 'gray',
            self::Automatic => 'blue',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Manual => 'heroicon-m-cog',
            self::Automatic => 'heroicon-m-chip',
        };
    }
}
