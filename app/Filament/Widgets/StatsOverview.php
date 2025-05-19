<?php

namespace App\Filament\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $userId = Auth::id(); // Ambil ID user yang sedang login

        $pemasukan = Transaksi::incomes()
            ->where('user_id', $userId)
            ->sum('jumlah');

        $pengeluaran = Transaksi::expenses()
            ->where('user_id', $userId)
            ->sum('jumlah');

        $selisih = $pemasukan - $pengeluaran;

        return [
            Stat::make('Total Pemasukan', 'Rp' . number_format($pemasukan, 0, ',', '.'))
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),

            Stat::make('Total Pengeluaran', 'Rp' . number_format($pengeluaran, 0, ',', '.'))
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),

            Stat::make('Selisih', 'Rp' . number_format($selisih, 0, ',', '.'))
                ->color($selisih >= 0 ? 'success' : 'danger'),
        ];
    }
}
