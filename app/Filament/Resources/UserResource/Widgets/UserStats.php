<?php

namespace App\Filament\Resources\UserResource\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\User ;

class UserStats extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make('new user' , User::count())
            ->description("cout new user ")
            ->chart([1,2,3,7,3,7])
            ->color('success'),

            Stat::make('new user' , User::count())
            ->description("cout new user ")
            ->chart([1,2,3,7,3,7])
            ->color('success'),

            Stat::make('new user' , User::count())
            ->description("cout new user ")
            ->chart([1,2,3,7,3,7])

        ];
    }
}
