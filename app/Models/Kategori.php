<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{

    protected $fillable = [
        'user_id',
        'nama',
        'is_expense',
        'gambar',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
