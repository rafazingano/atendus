<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum DrivetrainType: string implements HasLabel, HasDescription, HasColor, HasIcon
{
    case FourByTwo = '4x2';
    case FourByFour = '4x4';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::FourByTwo => '4x2',
            self::FourByFour => '4x4',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::FourByTwo => 'Tração apenas nas duas rodas dianteiras ou traseiras.',
            self::FourByFour => 'Tração nas quatro rodas (4x4).',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::FourByTwo => 'blue',
            self::FourByFour => 'green',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::FourByTwo => 'heroicon-m-truck',
            self::FourByFour => 'heroicon-m-truck-4x4',
        };
    }
}
