<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasDescription;
use Filament\Support\Contracts\HasIcon;
use Filament\Support\Contracts\HasLabel;

enum VehicleBodyType: string implements HasLabel, HasDescription, HasColor, HasIcon
{
    case Sedan = 'Sedan';
    case Hatchback = 'Hatchback';
    case SUV = 'SUV';
    case Coupe = 'Coupe';
    case Convertible = 'Conversível';
    case Wagon = 'Perua';
    case Pickup = 'Picape';
    case Van = 'Van';
    case Minivan = 'Minivan';
    case Crossover = 'Crossover';
    case Roadster = 'Roadster';
    case Motorcycle = 'Moto';
    case Truck = 'Caminhão';
    case Other = 'Outro';

    /**
     * Retorna o rótulo do tipo de carroceria.
     */
    public function getLabel(): ?string
    {
        return match ($this) {
            self::Sedan => 'Sedan',
            self::Hatchback => 'Hatchback',
            self::SUV => 'SUV',
            self::Coupe => 'Coupé',
            self::Convertible => 'Conversível',
            self::Wagon => 'Perua',
            self::Pickup => 'Picape',
            self::Van => 'Van',
            self::Minivan => 'Minivan',
            self::Crossover => 'Crossover',
            self::Roadster => 'Roadster',
            self::Motorcycle => 'Moto',
            self::Truck => 'Caminhão',
            self::Other => 'Outro',
        };
    }

    /**
     * Retorna a descrição do tipo de carroceria.
     */
    public function getDescription(): ?string
    {
        return match ($this) {
            self::Sedan => 'Veículo com carroceria de três volumes.',
            self::Hatchback => 'Carro com porta-malas integrado ao compartimento de passageiros.',
            self::SUV => 'Veículo utilitário esportivo, ideal para diversos terrenos.',
            self::Coupe => 'Carro esportivo de duas portas.',
            self::Convertible => 'Veículo com teto retrátil ou removível.',
            self::Wagon => 'Carro espaçoso com compartimento de carga alongado.',
            self::Pickup => 'Veículo com cabine e caçamba para carga.',
            self::Van => 'Veículo com grande capacidade de passageiros ou carga.',
            self::Minivan => 'Veículo familiar com capacidade para até sete passageiros.',
            self::Crossover => 'Combinação entre carro e SUV.',
            self::Roadster => 'Carro esportivo de dois lugares, geralmente conversível.',
            self::Motorcycle => 'Veículo de duas rodas motorizado.',
            self::Truck => 'Veículo de grande porte para transporte de cargas.',
            self::Other => 'Outro tipo de carroceria.',
        };
    }

    /**
     * Retorna a cor associada ao tipo de carroceria.
     */
    public function getColor(): string | array | null
    {
        return match ($this) {
            self::Sedan, self::Coupe => 'blue',
            self::SUV, self::Crossover => 'green',
            self::Hatchback, self::Roadster => 'yellow',
            self::Pickup, self::Truck => 'gray',
            self::Convertible => 'red',
            self::Wagon, self::Minivan => 'orange',
            self::Van => 'purple',
            self::Motorcycle => 'black',
            self::Other => 'cyan',
        };
    }

    /**
     * Retorna o ícone associado ao tipo de carroceria.
     */
    public function getIcon(): ?string
    {
        return match ($this) {
            self::Sedan => 'heroicon-m-car',
            self::Hatchback => 'heroicon-m-hatchback',
            self::SUV => 'heroicon-m-suv',
            self::Coupe => 'heroicon-m-coupe',
            self::Convertible => 'heroicon-m-convertible',
            self::Wagon => 'heroicon-m-wagon',
            self::Pickup => 'heroicon-m-truck',
            self::Van => 'heroicon-m-van',
            self::Minivan => 'heroicon-m-minivan',
            self::Crossover => 'heroicon-m-crossover',
            self::Roadster => 'heroicon-m-roadster',
            self::Motorcycle => 'heroicon-m-motorcycle',
            self::Truck => 'heroicon-m-truck',
            self::Other => 'heroicon-m-cube',
        };
    }
}
