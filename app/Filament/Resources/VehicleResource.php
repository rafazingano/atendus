<?php

namespace App\Filament\Resources;

use App\Enums\DrivetrainType;
use App\Enums\FuelType;
use App\Enums\TransmissionType;
use App\Enums\VehicleBodyType;
use App\Enums\VehicleCondition;
use App\Enums\VehicleStatus;
use App\Enums\VehicleType;
use App\Filament\Imports\VehicleImporter;
use App\Filament\Resources\VehicleResource\Pages;
use App\Filament\Resources\VehicleResource\RelationManagers;
use App\Models\Vehicle;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class VehicleResource extends Resource
{
    protected static ?string $model = Vehicle::class;
    protected static ?string $modelLabel = 'Veículo';
    protected static ?string $pluralModelLabel = 'Veículos';
    protected static ?string $navigationLabel = 'Meus veículos';
    protected static ?string $navigationGroup = 'Dados';
    protected static ?string $navigationIcon = 'heroicon-o-cube';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações do veículo')
                    ->columns(3)
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->label('Tipo')
                            ->options(VehicleType::class)
                            ->required(),
                        Forms\Components\TextInput::make('license_plate')
                            ->label('Placa')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('make')
                            ->label('Fabricante')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('model')
                            ->label('Modelo')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\Select::make('status')
                            ->label('Status')
                            ->options(VehicleStatus::class),
                        Forms\Components\Select::make('condition')
                            ->label('Condição')
                            ->options(VehicleCondition::class),
                        Forms\Components\Select::make('fuel_type')
                            ->label('Combustível')
                            ->options(FuelType::class),
                        Forms\Components\Select::make('transmission')
                            ->label('Transmissão')
                            ->options(TransmissionType::class),
                        Forms\Components\Select::make('drivetrain')
                            ->label('Tração')
                            ->options(DrivetrainType::class),
                        Forms\Components\Select::make('body_type')
                            ->label('Carroceria')
                            ->options(VehicleBodyType::class),
                        Forms\Components\TextInput::make('year')
                            ->label('Ano'),
                        Forms\Components\TextInput::make('color')
                            ->label('Cor')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('vin')
                            ->label('VIN')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('mileage')
                            ->label('Quilometragem')
                            ->numeric(),
                        Forms\Components\TextInput::make('engine')
                            ->label('Motor')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('number_of_doors')
                            ->label('Portas')
                            ->numeric(),
                        Forms\Components\TextInput::make('price')
                            ->label('Preço')
                            ->numeric()
                            ->prefix('R$'),
                        Forms\Components\TextInput::make('location')
                            ->label('Localização')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('features')
                            ->label('Características')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('description')
                            ->label('Descrição')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('make')
                    ->label('Fabricante')
                    ->searchable(),
                Tables\Columns\TextColumn::make('model')
                    ->label('Modelo')
                    ->searchable(),
                Tables\Columns\TextColumn::make('year')
                    ->label('Ano')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('color')
                    ->label('Cor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('vin')
                    ->label('VIN')
                    ->searchable(),
                Tables\Columns\TextColumn::make('license_plate')
                    ->label('Placa')
                    ->searchable(),
                Tables\Columns\TextColumn::make('mileage')
                    ->label('Quilometragem')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('number_of_doors')
                    ->label('Portas')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Preço')
                    ->money('BRL')
                    ->sortable(),
                Tables\Columns\TextColumn::make('status')
                    ->label('Status')
                    ->searchable(),
                Tables\Columns\TextColumn::make('location')
                    ->label('Localização')
                    ->searchable(),
                Tables\Columns\TextColumn::make('engine')
                    ->label('Motor')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('fuel_type')
                    ->label('Combustível')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('transmission')
                    ->label('Transmissão')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('body_type')
                    ->label('Carroceria')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('drivetrain')
                    ->label('Tração')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('Deletado em')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->headerActions([
                //Tables\Actions\ImportAction::make()->importer(VehicleImporter::class)
            ])
            ->actions([
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\ViewAction::make(),
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ]),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListVehicles::route('/'),
            'create' => Pages\CreateVehicle::route('/create'),
            'view' => Pages\ViewVehicle::route('/{record}'),
            'edit' => Pages\EditVehicle::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
