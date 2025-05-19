<?php

namespace App\Filament\Widgets;

use Filament\Widgets\Widget;
use App\Models\Transaksi;
use Illuminate\Support\Facades\Auth;

class AktivitasTerbaru extends Widget
{
    protected static string $view = 'filament.widgets.aktivitas-terbaru';

    protected int | string | array $columnSpan = 'full';

    public function render(): \Illuminate\View\View
    {
        return view(static::$view, [
            'transaksis' => Transaksi::where('user_id', Auth::id())
                ->latest()
                ->take(5)
                ->get(),
        ]);
    }
}
