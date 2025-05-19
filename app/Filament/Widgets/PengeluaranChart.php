<?php

namespace App\Filament\Widgets;

use App\Models\Transaksi;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class PengeluaranChart extends ChartWidget
{
    use InteractsWithForms;

    protected static ?string $heading = 'Pengeluaran per Bulan';
    protected static string $color = 'danger';

    public ?int $tahun = null;

    protected function getFormSchema(): array
    {
        return [
            Forms\Components\Select::make('tahun')
                ->label('Tahun')
                ->options(
                    collect(range(2022, now()->year + 1))
                        ->reverse()
                        ->mapWithKeys(fn ($year) => [$year => $year])
                        ->toArray()
                )
                ->default(now()->year)
                ->live(),
        ];
    }

    protected function getData(): array
    {
        $tahunDipilih = $this->tahun ?? now()->year;

        // Inisialisasi data per bulan dengan nilai 0
        $dataPerBulan = collect(range(1, 12))->mapWithKeys(fn ($bulan) => [$bulan => 0]);

        // Ambil transaksi pengeluaran sesuai tahun dan user yang login
        $transaksi = Transaksi::expenses()
            ->whereYear('tanggal', $tahunDipilih)
            ->where('user_id', Auth::id())
            ->get();

        // Total jumlah pengeluaran per bulan
        foreach ($transaksi as $item) {
            $bulan = Carbon::parse($item->tanggal)->month;
            $dataPerBulan[$bulan] += $item->jumlah;
        }

        $labels = [
            1 => 'Jan', 2 => 'Feb', 3 => 'Mar', 4 => 'Apr',
            5 => 'Mei', 6 => 'Jun', 7 => 'Jul', 8 => 'Agu',
            9 => 'Sep', 10 => 'Okt', 11 => 'Nov', 12 => 'Des',
        ];

        return [
            'datasets' => [
                [
                    'label' => "Pengeluaran Tahun $tahunDipilih",
                    'data' => $dataPerBulan->values(),
                ],
            ],
            'labels' => array_values($labels),
        ];
    }

    protected function getType(): string
    {
        return 'bar'; // Bisa diganti jadi 'line' kalau mau chart garis
    }
}
