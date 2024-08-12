<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image',
        'video',
        'name',
        'user_id',
        'post_status',
        'usertype',
        'category_id',
    ];

    public function likes() {
        return $this->belongsToMany(User::class, 'post_like')->withTimestamps();
    }

    public function comments() {
        return $this->hasMany(Comment::class);
    }

    public function category() {
        return $this->belongsTo(Category::class);
    }

}
