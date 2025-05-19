<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaksi extends Model
{
    protected $fillable = [
        'user_id',
        'nama',
        'kategori_id',
        'tanggal',
        'jumlah',
        'catatan',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Kategori::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeExpenses($query)
    {
        return $query->whereHas('kategori', function ($query) {
            $query->where('is_expense', true);
        });
    }

    public function scopeIncomes($query)
    {
        return $query->whereHas('kategori', function ($query) {
            $query->where('is_expense', false);
        });
    }

    // Optional: Scope untuk filter data milik user tertentu
    public function scopeOwnedBy($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
