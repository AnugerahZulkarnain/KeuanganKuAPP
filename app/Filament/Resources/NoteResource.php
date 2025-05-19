<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NoteResource\Pages;
use App\Models\Note;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class NoteResource extends Resource
{
    protected static ?string $model = Note::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Note';
    protected static ?string $navigationLabel = 'Buat Notes';
    protected static ?string $pluralModelLabel = 'Note';
    protected static ?string $modelLabel = 'Note';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id()),
                Forms\Components\TextInput::make('judul')
                    ->required()
                    ->maxLength(255)
                    ->label('Judul'),
                Forms\Components\Textarea::make('catatan')
                    ->required()
                    ->rows(5)
                    ->label('Catatan'),
                Forms\Components\DatePicker::make('tanggal_dicatat')
                    ->label('Pengingat'),
                Forms\Components\Select::make('status')
                    ->options([
                        'rencana' => 'Rencana',
                        'sedang_dilaksanakan' => 'Sedang Dilaksanakan',
                        'selesai' => 'Selesai',
                    ])
                    ->default('rencana')
                    ->required()
                    ->label('Status'),
                Forms\Components\Select::make('prioritas')
                    ->options([
                        'rendah' => 'Rendah',
                        'sedang' => 'Sedang',
                        'tinggi' => 'Tinggi',
                    ])
                    ->default('sedang')
                    ->required()
                    ->label('Prioritas'),
            ]);
    }

    public static function table(Table $table): Table
{
    return $table
        ->columns([
            Tables\Columns\TextColumn::make('judul')->searchable()->sortable()->label('Judul'),
            Tables\Columns\TextColumn::make('status')->sortable()->label('Status'),
            Tables\Columns\TextColumn::make('prioritas')
                ->sortable()
                ->label('Prioritas')
                ->color(fn ($state) => match ($state) {
                    'rendah' => 'primary',   // biru
                    'sedang' => 'success',   // hijau
                    'tinggi' => 'danger',    // merah
                    default => 'secondary',
                }),
            Tables\Columns\TextColumn::make('tanggal_dicatat')
                ->date()
                ->sortable()
                ->label('Pengingat'),
            Tables\Columns\TextColumn::make('created_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true)
                ->label('Tanggal Dibuat'),
            Tables\Columns\TextColumn::make('updated_at')
                ->dateTime()
                ->sortable()
                ->toggleable(isToggledHiddenByDefault: true)
                ->label('Terakhir Diubah'),
        ])
        ->filters([
            Tables\Filters\SelectFilter::make('status')
                ->options([
                    'rencana' => 'Rencana',
                    'sedang_dilaksanakan' => 'Sedang Dilaksanakan',
                    'selesai' => 'Selesai',
                ]),
            Tables\Filters\SelectFilter::make('prioritas')
                ->options([
                    'rendah' => 'Rendah',
                    'sedang' => 'Sedang',
                    'tinggi' => 'Tinggi',
                ]),
        ])
        ->actions([
            Tables\Actions\EditAction::make(),
        ])
        ->bulkActions([
            Tables\Actions\BulkActionGroup::make([
                Tables\Actions\DeleteBulkAction::make(),
            ]),
        ]);
}

    

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNotes::route('/'),
            'create' => Pages\CreateNote::route('/create'),
            'edit' => Pages\EditNote::route('/{record}/edit'),
        ];
    }
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', auth()->id());
    }
}
