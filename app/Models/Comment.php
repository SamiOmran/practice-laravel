<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\{
    HasTimestamps,
    HasUuids,
};
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    use HasUuids;
    use HasFactory;
    use HasTimestamps;

    protected $fillable = [
        'text',
        'article_id',
        'user_id',
    ];

    public function article(): BelongsTo
    {
        return $this->belongsTo(Article::class);
    }
}
