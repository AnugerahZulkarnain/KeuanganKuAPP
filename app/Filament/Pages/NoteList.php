<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class NoteList extends Page
{
    protected static ?string $navigationGroup = 'Note';
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static string $view = 'filament.pages.note-list';

    public $notes;

    public function mount(): void
    {
        $this->notes = Note::where('user_id', Auth::id())
            ->latest()
            ->get();
    }
}
