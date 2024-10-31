<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrganizationResource\Pages;
use App\Filament\Resources\OrganizationResource\RelationManagers;
use App\Models\Organization;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OrganizationResource extends Resource
{
    protected static ?string $model = Organization::class;
    protected static ?string $modelLabel = 'Organização';
    protected static ?string $pluralModelLabel = 'Organizações';
    protected static ?string $navigationLabel = 'Minhas organizações';
    protected static ?string $navigationGroup = 'Dados';
    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações básicas')
                    ->columns(3)
                    ->schema([
                        Forms\Components\FileUpload::make('logo')
                            ->label('Logo')
                            ->image()
                            ->maxFiles(1),
                        Forms\Components\FileUpload::make('banner')
                            ->label('Banner')
                            ->image()
                            ->maxFiles(1)
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('name')
                            ->label('Nome')
                            ->placeholder('Ex: Oficina do João')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('website')
                            ->url()
                            ->label('Website')
                            ->placeholder('Ex: https://www.example.com')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('cnpj_cpf')
                            ->label('CNPJ/CPF')
                            ->placeholder('Ex: 00.000.000/0000-00')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('address')
                            ->label('Endereço')
                            ->placeholder('Ex: Rua dos Bobos, 0')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('city')
                            ->label('Cidade')
                            ->placeholder('Ex: Porto Alegre')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('state')
                            ->label('Estado')
                            ->placeholder('Ex: Rio Grande do Sul')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('zip_code')
                            ->label('CEP')
                            ->placeholder('Ex: 00000-000')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('phone')
                            ->label('Telefone')
                            ->placeholder('Ex: (00) 0000-0000')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('whatsapp')
                            ->label('WhatsApp')
                            ->placeholder('Ex: (00) 00000-0000')
                            ->tel()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('email')
                            ->label('E-mail')
                            ->placeholder('Ex: contato@gmail.com')
                            ->email()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('business_type')
                            ->label('Tipo de negócio')
                            ->placeholder('Ex: Oficina mecânica')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('vehicle_types')
                            ->label('Tipos de veículos')
                            ->placeholder('Ex: Carros, motos, caminhões')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('preferred_brands')
                            ->label('Marcas preferidas')
                            ->placeholder('Ex: Chevrolet, Honda, Volkswagen')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('price_range')
                            ->label('Faixa de preço')
                            ->placeholder('Ex: R$ 100,00 - R$ 200,00')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('working_hours')
                            ->label('Horário de funcionamento')
                            ->placeholder('Ex: Segunda a sexta, das 8h às 18h')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('payment_methods')
                            ->label('Métodos de pagamento')
                            ->placeholder('Ex: Dinheiro, cartão de crédito, boleto')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('target_audience')
                            ->label('Público-alvo')
                            ->placeholder('Ex: Homens e mulheres de 18 a 35 anos')
                            ->maxLength(255),
                        Forms\Components\Textarea::make('current_offers')
                            ->label('Ofertas atuais')
                            ->placeholder('Ex: 10% de desconto em todos os serviços')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('warranty_policy')
                            ->label('Política de garantia')
                            ->placeholder('Ex: 1 ano de garantia em todos os serviços')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('additional_services')
                            ->label('Serviços adicionais')
                            ->placeholder('Ex: Troca de óleo, alinhamento e balanceamento')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('faq')
                            ->label('Perguntas frequentes')
                            ->placeholder('Ex: Qual é o prazo de entrega?')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('sales_process')
                            ->label('Processo de vendas')
                            ->placeholder('Ex: O cliente entra em contato e agendamos um horário')
                            ->columnSpanFull(),
                        Forms\Components\Textarea::make('success_stories')
                            ->label('Histórias de sucesso')
                            ->placeholder('Ex: Cliente X economizou R$ 500,00')
                            ->columnSpanFull(),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('website')
                    ->label('Website')
                    ->searchable(),
                Tables\Columns\TextColumn::make('cnpj_cpf')
                    ->label('CNPJ/CPF')
                    ->searchable(),
                Tables\Columns\TextColumn::make('phone')
                    ->label('Telefone')
                    ->searchable(),
                Tables\Columns\TextColumn::make('whatsapp')
                    ->label('WhatsApp')
                    ->searchable(),
                Tables\Columns\TextColumn::make('email')
                    ->label('E-mail')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->since()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
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
            'index' => Pages\ListOrganizations::route('/'),
            'create' => Pages\CreateOrganization::route('/create'),
            'view' => Pages\ViewOrganization::route('/{record}'),
            'edit' => Pages\EditOrganization::route('/{record}/edit'),
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
