<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Book extends Model
{
    protected $fillable = ['title', 'genre_id', 'published_year'];

    public function genre(): BelongsTo
    {
        return $this->belongsTo(Genre::class);
    }
}