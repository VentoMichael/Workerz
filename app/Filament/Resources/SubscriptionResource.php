<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SubscriptionResource\Pages;
use App\Filament\Resources\SubscriptionResource\RelationManagers;
use App\Models\Plan;
use Filament\Forms;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Laravel\Cashier\Subscription;

class SubscriptionResource extends Resource
{
    protected static ?string $model = \Laravel\Cashier\Subscription::class;

    protected static ?string $slug = 'subscriptions';

    protected static ?string $recordTitleAttribute = 'number';

    protected static ?string $navigationGroup = 'Customers';

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    protected static ?int $navigationSort = 2;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema(static::getFormSchema())
                            ->columns(2),
                    ])
                    ->columnSpan(['lg' => fn(?Subscription $record) => $record === null ? 3 : 2]),

                Forms\Components\Section::make()
                    ->schema([
                        Forms\Components\Placeholder::make('created_at')
                            ->label('Created at')
                            ->content(fn(Subscription $record): ?string => $record->created_at?->diffForHumans()),

                        Forms\Components\Placeholder::make('updated_at')
                            ->label('Last modified at')
                            ->content(fn(Subscription $record): ?string => $record->updated_at?->diffForHumans()),
                    ])
                    ->columnSpan(['lg' => 1])
                    ->hidden(fn(?Subscription $record) => $record === null),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('owner.username')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('stripe_status')
                    ->badge()
                    ->colors([
                        'danger' => 'cancelled',
                        'warning' => 'incomplete',
                        'success' => fn($state) => in_array($state, ['active']),
                    ]),
                Tables\Columns\TextColumn::make('price')
                    ->searchable()
                    ->sortable()
                    ->summarize([
                        Tables\Columns\Summarizers\Sum::make()
                            ->money('eur'),
                    ]),
                CheckboxColumn::make('is_annualy')
                    ->label('Annualy payment')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Subscription Date')
                    ->date()
                    ->toggleable(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->groupedBulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->action(function () {
                        Notification::make()
                            ->title('Now, now, don\'t be cheeky, leave some records for others to play with!')
                            ->warning()
                            ->send();
                    }),
            ])
            ->groups([
                Tables\Grouping\Group::make('created_at')
                    ->label('Subscription Date')
                    ->date()
                    ->collapsible(),
                Tables\Grouping\Group::make('stripe_status')
                    ->label('Status')
                    ->collapsible()
            ]);
    }


    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSubscriptions::route('/'),
            'create' => Pages\CreateSubscription::route('/create'),
            'edit' => Pages\EditSubscription::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()->withoutGlobalScope(SoftDeletingScope::class);
    }

    public static function getGloballySearchableAttributes(): array
    {
        return ['number', 'customer.name'];
    }

    public static function getGlobalSearchEloquentQuery(): Builder
    {
        return parent::getGlobalSearchEloquentQuery()->with(['customer', 'items']);
    }

    public static function getNavigationBadge(): ?string
    {
        return static::$model::where('stripe_status', 'active')->count();
    }

    public static function getFormSchema(string $section = null): array
    {
        return [
            Forms\Components\Select::make('owner.username')
                ->relationship('owner', 'username')
                ->searchable()
                ->disabled(),

            Forms\Components\Select::make('stripe_status')
                ->options([
                    'active' => 'Active',
                    'incomplete' => 'Incomplete',
                    'cancelled' => 'Cancelled',
                ])
                ->required(),
            Forms\Components\Select::make('name')
                ->label('Product')
                ->options(Plan::query()->pluck('name', 'name'))
                ->required()
                ->reactive()
                ->afterStateUpdated(fn($state, Forms\Set $set) => $set('price', Plan::find($state)?->price)),
            //TODO::when updating annually update in stripe the date
            Toggle::make('is_annualy')
                ->label('Annualy payment'),
        ];
    }
}

