<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'post';

    protected $fillable = [
        "title",
        "news_content",
        "author",
        "image"
    ];

    public function writer()
    {
        return $this->belongsTo(User::class, 'author', 'id');
    }

    /**
     * Get all of the comments for the Comment
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comment(): HasMany
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}