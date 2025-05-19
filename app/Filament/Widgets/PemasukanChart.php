<?php

namespace App\Filament\Widgets;

use App\Models\Transaksi;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Contracts\HasForms;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Facades\Auth;

class PemasukanChart extends ChartWidget implements HasForms
{
    use InteractsWithForms;

    protected static ?string $heading = 'Pemasukan per Bulan';
    protected static string $color = 'success';

    public ?int $tahun = null;

    public function mount(): void
    {
        $this->form->fill([
            'tahun' => now()->year,
        ]);
    }

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
                ->live()
                ->required(),
        ];
    }

    protected function getData(): array
    {
        $tahunDipilih = $this->tahun ?? now()->year;

        // Inisialisasi data per bulan dengan nilai 0
        $dataPerBulan = collect(range(1, 12))->mapWithKeys(fn ($bulan) => [$bulan => 0]);

        // Ambil transaksi pemasukan sesuai tahun dan user
        $transaksi = Transaksi::incomes()
            ->whereYear('tanggal', $tahunDipilih)
            ->where('user_id', Auth::id())
            ->get();

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
                    'label' => "Pemasukan Tahun $tahunDipilih",
                    'data' => $dataPerBulan->values(),
                ],
            ],
            'labels' => array_values($labels),
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
