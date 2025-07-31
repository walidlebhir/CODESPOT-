<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;

use Filament\Tables\Actions\Action;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name') ,
                TextInput::make('email'),
                TextInput::make('password'),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            TextColumn::make('id')->label('ID')->sortable()->searchable(),
            TextColumn::make('name')->label('Nom')->sortable()->searchable(),
            TextColumn::make('email')->label('Email')->sortable()->searchable(),
            TextColumn::make('status')
                ->label('Statut')
                ->badge() // pour afficher comme un badge coloré
                ->color(fn (string $state): string => match ($state) {
                    'enabled' => 'success',   // vert
                    'disabled' => 'danger',   // rouge
                    default => 'gray',        // gris pour autre chose
                })
                ->sortable()
                ->searchable(),
            TextColumn::make('last_login')
                ->label('Dernière connexion')
                ->dateTime()
                ->sortable(),
            TextColumn::make('created_at')
                ->label('Créé le')
                ->dateTime()
                ->sortable(),
        ])
        ->filters([
            //
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
            Action::make('block')
                ->label('Bloquer')
                ->icon('heroicon-o-lock-closed')
                ->color('danger')
                ->requiresConfirmation()
                ->action(function ($record) {
                    $record->update(['status' => 'disabled']);
                }),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
