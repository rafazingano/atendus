<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ChatResource\Pages;
use App\Filament\Resources\ChatResource\RelationManagers;
use App\Models\Chat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Schema;

class ChatResource extends Resource
{
    protected static ?string $model = Chat::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informações do chat')
                    ->columns(2)
                    ->Schema([
                        Forms\Components\Select::make('organization_id')
                            ->label('Organização')
                            ->placeholder('Selecione uma organização')
                            ->options(fn () => Schema::hasTable('organizations') ? \App\Models\Organization::pluck('name', 'id') : [])
                            ->nullable()
                            ->columnSpan(2),
                        Forms\Components\TextInput::make('name')
                            ->label('Nome do chat')
                            ->maxLength(255),
                        Forms\Components\Select::make('language')
                            ->label('Idioma do chat')
                            ->required()
                            ->options([
                                'pt_BR' => 'Português (Brasil)',
                                'en_US' => 'Inglês (EUA)',
                                'es_ES' => 'Espanhol (Espanha)',
                            ])
                            ->default('pt_BR'),
                        Forms\Components\TextInput::make('agent_name')
                            ->label('Nome do agente')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('site_name')
                            ->label('Nome do site')
                            ->maxLength(255),
                        Forms\Components\TextInput::make('site_url')
                            ->label('URL do site')
                            ->url()
                            ->required()
                            ->maxLength(255),
                        Forms\Components\RichEditor::make('initial_message')
                            ->label('Mensagem inicial')
                            ->columnSpanFull(),
                        Forms\Components\Toggle::make('status')
                            ->label('Status')
                            ->default(true),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                Tables\Columns\TextColumn::make('language')
                    ->label('Idioma')
                    ->searchable(),
                Tables\Columns\TextColumn::make('agent_name')
                    ->label('Agente')
                    ->searchable(),
                Tables\Columns\TextColumn::make('site_name')
                    ->label('Site')
                    ->searchable(),
                Tables\Columns\TextColumn::make('site_url')
                    ->label('URL do site')
                    ->searchable(),
                Tables\Columns\TextColumn::make('user.name')
                    ->label('Usuário')
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('status')
                    ->label('Status')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('Deletado em')
                    ->dateTime()
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

                    Tables\Actions\Action::make('copyCode')
                        ->label('Obter Código')
                        ->icon('heroicon-o-clipboard')
                        ->modalHeading('Código JavaScript para o Chat')
                        ->modalSubheading('Copie e cole este código no seu site para ativar o chat.')
                        ->modalButton('Fechar')
                        ->action(function () {
                            Notification::make()
                                ->title('Código copiado para a área de transferência!')
                                ->success()
                                ->send();
                        })
                        ->modalContent(function ($record) {
                            $scriptCode = "
<script>
    (function () {
        const clientID = '" . $record->uuid . "'; 
        const script = document.createElement('script');
        script.src = '" . config('app.url') . "/chatbot.js';
        script.async = true;
        document.head.appendChild(script);
        script.onload = function () {
            if (window.initializeChatBot) {
                window.initializeChatBot(clientID); 
            }
        };
    })();
</script>";
                            return view('filament.resources.chats.copy-code-modal', [
                                'scriptCode' => $scriptCode,
                            ]);
                        }),
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
            'index' => Pages\ListChats::route('/'),
            'create' => Pages\CreateChat::route('/create'),
            'view' => Pages\ViewChat::route('/{record}'),
            'edit' => Pages\EditChat::route('/{record}/edit'),
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
