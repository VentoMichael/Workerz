<?php

namespace App\Filament\Widgets;

use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class StatsOverview extends BaseWidget
{
    protected static ?string $heading = 'Chart';
    protected static ?string $color = 'info';

    protected function getStats(): array
    {
        return [
            Card::make('Total Users', User::count()),
            Card::make('Users Registered Today', User::where('created_at', today())->count()),
        ];
    }
}
