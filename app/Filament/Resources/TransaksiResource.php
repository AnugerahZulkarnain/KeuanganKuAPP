<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TransaksiResource\Pages;
use App\Models\Transaksi;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TransaksiResource extends Resource
{
    protected static ?string $model = Transaksi::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';
    protected static ?string $navigationLabel = 'Transaksi';
    protected static ?string $navigationGroup = 'Manajemen';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Hidden user_id, otomatis set ke user login
                Forms\Components\Hidden::make('user_id')
                    ->default(auth()->id()),

                Forms\Components\TextInput::make('nama')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('kategori_id')
                    ->relationship('kategori', 'nama', function ($query) {
                        // filter kategori hanya milik user login
                        $query->where('user_id', auth()->id());
                    })
                    ->required(),

                Forms\Components\DatePicker::make('tanggal')
                    ->required(),

                Forms\Components\TextInput::make('jumlah')
                    ->required()
                    ->numeric(),

                Forms\Components\TextInput::make('catatan')
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('kategori.gambar'),
                Tables\Columns\TextColumn::make('kategori.nama')
                    ->label('Kategori')
                    ->searchable(),

                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Transaksi')
                    ->searchable(),

                Tables\Columns\IconColumn::make('kategori.is_expense')
                    ->label('Tipe')
                    ->trueIcon('heroicon-o-arrow-up-circle')
                    ->falseIcon('heroicon-o-arrow-down-circle')
                    ->falseColor('success')
                    ->trueColor('danger')
                    ->boolean(),

                Tables\Columns\TextColumn::make('tanggal')
                    ->label('Tanggal')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('jumlah')
                    ->label('Jumlah')
                    ->numeric()
                    ->money('IDR', locale: 'id')
                    ->sortable(),

                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
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
            'index' => Pages\ListTransaksis::route('/'),
            'create' => Pages\CreateTransaksi::route('/create'),
            'edit' => Pages\EditTransaksi::route('/{record}/edit'),
        ];
    }

    /**
     * Filter data transaksi yang tampil berdasarkan user login
     */
    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->where('user_id', auth()->id())
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }
}
