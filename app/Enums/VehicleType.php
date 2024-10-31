<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum VehicleType: string implements HasLabel, HasDescription, HasColor, HasIcon
{
    case Car = 'Carro';
    case Motorcycle = 'Moto';
    case Boat = 'Barco';
    case Truck = 'Caminhão';
    case Bus = 'Ônibus';
    case Trailer = 'Trailer';
    case Plane = 'Avião';
    case Helicopter = 'Helicóptero';
    case Bicycle = 'Bicicleta';
    case Atv = 'Quadriciclo';
    case Tractor = 'Trator';
    case Scooter = 'Scooter';
    case Other = 'Outro';

    public function getLabel(): ?string
    {
        return match ($this) {
            self::Car => 'Carro',
            self::Motorcycle => 'Moto',
            self::Boat => 'Barco',
            self::Truck => 'Caminhão',
            self::Bus => 'Ônibus',
            self::Trailer => 'Trailer',
            self::Plane => 'Avião',
            self::Helicopter => 'Helicóptero',
            self::Bicycle => 'Bicicleta',
            self::Atv => 'Quadriciclo',
            self::Tractor => 'Trator',
            self::Scooter => 'Scooter',
            self::Other => 'Outro',
        };
    }

    public function getDescription(): ?string
    {
        return match ($this) {
            self::Car => 'Veículo automóvel convencional.',
            self::Motorcycle => 'Motocicleta ou similar.',
            self::Boat => 'Barco ou embarcação.',
            self::Truck => 'Veículo de transporte ou caminhão.',
            self::Bus => 'Veículo de transporte coletivo.',
            self::Trailer => 'Trailer ou motorhome.',
            self::Plane => 'Aeronave de asa fixa.',
            self::Helicopter => 'Aeronave de asa rotativa.',
            self::Bicycle => 'Bicicleta ou e-bike.',
            self::Atv => 'Quadriciclo de uso recreativo.',
            self::Tractor => 'Veículo agrícola ou trator.',
            self::Scooter => 'Scooter convencional ou elétrica.',
            self::Other => 'Outro tipo de veículo.',
        };
    }

    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Car, self::Motorcycle => 'blue',
            self::Boat, self::Plane, self::Helicopter => 'cyan',
            self::Truck, self::Bus => 'gray',
            self::Trailer, self::Atv => 'orange',
            self::Tractor => 'green',
            self::Scooter, self::Bicycle => 'yellow',
            self::Other => 'purple',
        };
    }

    public function getIcon(): ?string
    {
        return match ($this) {
            self::Car => 'heroicon-m-car',
            self::Motorcycle => 'heroicon-m-motorcycle',
            self::Boat => 'heroicon-m-boat',
            self::Truck => 'heroicon-m-truck',
            self::Bus => 'heroicon-m-bus',
            self::Trailer => 'heroicon-m-trailer',
            self::Plane => 'heroicon-m-plane',
            self::Helicopter => 'heroicon-m-helicopter',
            self::Bicycle => 'heroicon-m-bicycle',
            self::Atv => 'heroicon-m-atv',
            self::Tractor => 'heroicon-m-tractor',
            self::Scooter => 'heroicon-m-scooter',
            self::Other => 'heroicon-m-cube',
        };
    }
}
