<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget\Card;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class ATotalTransaksiWidget extends BaseWidget
{
    protected function getCards(): array
    {
        $totalTransaksi = Transaksi::where('user_id', Auth::id())->count();

        return [
            Card::make('Total Transaksi', $totalTransaksi)
                ->description('Jumlah transaksi yang telah dilakukan')
                ->descriptionIcon('heroicon-o-arrow-trending-up')
                ->color('success'),
        ];
    }
}
