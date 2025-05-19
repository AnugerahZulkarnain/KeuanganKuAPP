<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class RekapTransaksi extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-arrow-down-on-square';
    protected static ?string $navigationLabel = 'Rekap Transaksi';
    protected static ?string $navigationGroup = 'Export';
    protected static string $view = 'filament.pages.rekap-transaksi';

    public $bulan;
    public $tahun;

    public function mount()
    {
        $this->bulan = date('m');   // default bulan sekarang
        $this->tahun = date('Y');   // default tahun sekarang
    }

    public function generatePdf()
    {
        $this->validate([
            'bulan' => 'required|numeric|min:1|max:12',
            'tahun' => 'required|numeric|min:2000|max:' . date('Y'),
        ]);

        // Ambil user id yang login
        $userId = Auth::id();

        // Query transaksi milik user yang login, sesuai bulan & tahun
        $transaksis = Transaksi::with('kategori')
            ->where('user_id', $userId)           // filter by user yang login
            ->whereMonth('tanggal', $this->bulan)
            ->whereYear('tanggal', $this->tahun)
            ->get();

        // Load view PDF dengan data
        $pdf = Pdf::loadView('exports.transaksi', [
            'transaksis' => $transaksis,
            'bulan' => $this->bulan,
            'tahun' => $this->tahun,
        ])->setPaper('a4', 'portrait');

        // Download file PDF hasil generate
        return response()->streamDownload(
            fn () => print($pdf->output()),
            "rekap-transaksi-{$this->bulan}-{$this->tahun}.pdf"
        );
    }
}
