<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'title',
        'image',
        'description',
        'content',
        'view',
        'category_id',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function comments()
{
    return $this->hasMany(Comment::class);
}
}
