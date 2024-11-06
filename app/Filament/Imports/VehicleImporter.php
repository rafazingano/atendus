<?php

namespace App\Filament\Imports;

use App\Models\Vehicle;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;

class VehicleImporter extends Importer
{
    protected static ?string $model = Vehicle::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('type')
                ->example('Carro')
                ->label('Tipo')
                ->requiredMapping()
                ->rules(['required']),
            ImportColumn::make('make')
                ->example('Ford')
                ->label('Fabricante')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('model')
                ->example('Fiesta')
                ->label('Modelo')
                ->requiredMapping()
                ->rules(['required', 'max:255']),
            ImportColumn::make('condition')
                ->example('Usado')
                ->label('Condição'),
            ImportColumn::make('year')
                ->example('2010')
                ->numeric()
                ->rules(['integer'])
                ->label('Ano'),
            ImportColumn::make('color')
                ->example('Preto')
                ->rules(['max:255'])
                ->label('Cor'),
            ImportColumn::make('vin')
                ->example('1HGCM82633A123456')
                ->rules(['max:255'])
                ->label('VIN'),
            ImportColumn::make('license_plate')
                ->example('ABC1234')
                ->rules(['max:255'])
                ->label('Placa'),
            ImportColumn::make('mileage')
                ->example('100000')
                ->label('Quilometragem')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('engine')
                ->example('1.6')
                ->label('Motor')
                ->rules(['max:255']),
            ImportColumn::make('fuel_type')
                ->example('Gasolina')
                ->label('Combustível'),
            ImportColumn::make('transmission')
                ->example('Automático')
                ->label('Transmissão'),
            ImportColumn::make('number_of_doors')
                ->example('4')
                ->label('Portas')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('body_type')
                ->example('Sedan')
                ->label('Carroceria'),
            ImportColumn::make('drivetrain')
                ->example('4x2')
                ->label('Tração'),
            ImportColumn::make('features')
                ->example('Ar condicionado, vidros elétricos')
                ->label('Características'),
            ImportColumn::make('price')
                ->example('10000')
                ->label('Preço')
                ->numeric()
                ->rules(['integer']),
            ImportColumn::make('status')
                ->example('Disponível')
                ->label('Status'),
            ImportColumn::make('description')
                ->example('Veículo em ótimo estado')
                ->label('Descrição'),
            ImportColumn::make('location')
                ->example('São Paulo')
                ->rules(['max:255'])
                ->label('Localização'),
        ];
    }

    public function resolveRecord(): ?Vehicle
    {
        // return Vehicle::firstOrNew([
        //     // Update existing records, matching them by `$this->data['column_name']`
        //     'email' => $this->data['email'],
        // ]);

        return new Vehicle();
    }

    public static function getCompletedNotificationBody(Import $import): string
    {
        $body = 'Your vehicle import has completed and ' . number_format($import->successful_rows) . ' ' . str('row')->plural($import->successful_rows) . ' imported.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' ' . number_format($failedRowsCount) . ' ' . str('row')->plural($failedRowsCount) . ' failed to import.';
        }

        return $body;
    }
}
