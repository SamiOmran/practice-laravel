<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasTimestamps;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasFactory;
    use HasTimestamps;

    protected $fillable = [
        'text',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
