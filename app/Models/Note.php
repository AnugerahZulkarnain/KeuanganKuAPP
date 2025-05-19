<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Note extends Model
{
    protected $fillable = [
        'user_id',
        'judul',
        'catatan',
        'tanggal_dicatat',
        'status',
        'prioritas',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Scope untuk filter catatan milik user tertentu
     */
    public function scopeOwnedBy($query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
