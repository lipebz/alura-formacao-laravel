<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Episode extends Model
{
    use HasFactory;

    protected $casts = [
        'watched' => 'boolean'
    ];

    public $timestamps = false;

    public function season(): BelongsTo
    {
        return $this->belongsTo(Season::class);
    }
}
