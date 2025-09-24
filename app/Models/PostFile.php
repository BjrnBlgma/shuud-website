<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PostFile extends Model
{
    protected $table = 'post_files';

    protected $fillable = [
        'post_id',
        'file_id',
        'is_main'
    ];

    public function post(): BelongsTo
    {
        return $this->belongsTo(Post::class);
    }

    public function file(): BelongsTo
    {
        return $this->belongsTo(File::class);
    }
}
