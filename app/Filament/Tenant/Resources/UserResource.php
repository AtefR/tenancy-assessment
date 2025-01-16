<?php

namespace App\Filament\Tenant\Resources;

use App\Filament\Tenant\Resources\UserResource\RelationManagers\CoursesRelationManager;
use App\Models\User;
use App\Providers\Filament\Tenant\Resources\UserResource\Pages;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $slug = 'users';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required(),

                TextInput::make('email')
                    ->required()
                    ->email(),

                TextInput::make('password')
                    ->required()
                    ->password()
                    ->confirmed(),

                TextInput::make('password_confirmation')
                    ->required()
                    ->password(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('email')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => \App\Filament\Tenant\Resources\UserResource\Pages\ListUsers::route('/'),
            'create' => \App\Filament\Tenant\Resources\UserResource\Pages\CreateUser::route('/create'),
            'edit' => \App\Filament\Tenant\Resources\UserResource\Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['name', 'email'];
    }

    public static function getRelations(): array
    {
        return [
            CoursesRelationManager::class,
        ];
    }
}
