<?php

namespace App\Filament\Widgets;

use App\Models\Note;
use Filament\Widgets\Widget;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AClosestNoteWidget extends Widget
{
    protected static string $view = 'filament.widgets.a-closest-note-widget';

    public $closestNote;

    public function mount()
    {
        $today = Carbon::today();

        $this->closestNote = Note::query()
            ->where('user_id', Auth::id()) // filter berdasarkan user
            ->whereDate('tanggal_dicatat', '>=', $today)
            ->orderByRaw('ABS(DATEDIFF(tanggal_dicatat, ?))', [$today])
            ->first();
    }
}
