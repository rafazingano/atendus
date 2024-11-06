<?php

namespace App\Filament\Resources\VehicleResource\Pages;

use App\Filament\Imports\VehicleImporter;
use App\Filament\Resources\VehicleResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListVehicles extends ListRecords
{
    protected static string $resource = VehicleResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ImportAction::make('vehicleImporter')
                ->label('Importar veículos')
                ->importer(VehicleImporter::class),
            Actions\CreateAction::make()
                ->label('Adicionar veículo'),
        ];
    }
}
