<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    protected $table = 'posts';

    protected $fillable = [
        'title',
        'slug',
        'excerpt',
        'content',
        'user_id',
        'post_type_id',
        'status',
        'published_at',
        'is_announcement',
        'featured_until',
        'event_date',
        'location',
        'external_links',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function postType(): BelongsTo
    {
        return $this->belongsTo(PostType::class);
    }
}
