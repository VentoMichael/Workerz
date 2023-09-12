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

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('email')
                    ->email()->disabled()
                    ->maxLength(255),
                Forms\Components\TextInput::make('username')->disabled()
                    ->maxLength(255),
                Forms\Components\FileUpload::make('avatarUpload')->disabled(),
                Forms\Components\FileUpload::make('backgroundUpload')->disabled(),
                Forms\Components\TextInput::make('firstname')
                    ->maxLength(255),
                Forms\Components\TextInput::make('lastname')
                    ->maxLength(255),
                Forms\Components\TextInput::make('about')
                    ->maxLength(255),
                Forms\Components\TextInput::make('streetAddress')
                    ->maxLength(255),
                Forms\Components\TextInput::make('city')
                    ->maxLength(255),
                Forms\Components\TextInput::make('region')
                    ->maxLength(255),
                Forms\Components\TextInput::make('postalCode')
                    ->maxLength(255),
                Forms\Components\DateTimePicker::make('email_verified_at'),
                Forms\Components\Toggle::make('tutorial_shown')
                    ->required(),
                Forms\Components\Toggle::make('hiring')
                    ->required(),
                Forms\Components\Toggle::make('private')
                    ->required(),
                Forms\Components\Toggle::make('allow_commenting')
                    ->required(),
                Forms\Components\DateTimePicker::make('two_factor_confirmed_at'),
                Forms\Components\DateTimePicker::make('trial_ends_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('email')
                    ->searchable(),
                Tables\Columns\TextColumn::make('username')
                    ->searchable(),
                Tables\Columns\TextColumn::make('firstname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('lastname')
                    ->searchable(),
                Tables\Columns\TextColumn::make('about'),
                Tables\Columns\TextColumn::make('streetAddress'),
                Tables\Columns\TextColumn::make('city'),
                Tables\Columns\TextColumn::make('region'),
                Tables\Columns\TextColumn::make('postalCode'),
                Tables\Columns\BooleanColumn::make('hiring'),
                Tables\Columns\BooleanColumn::make('private'),
                Tables\Columns\BooleanColumn::make('allow_commenting'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
