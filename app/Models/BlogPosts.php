<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogPosts extends Model
{
    use HasFactory;

    protected $table = 'blog_posts';

    protected $fillable = ['title', 'description', 'image','meta_title', 'meta_description', 'meta_keyword', 'created_by','category_id'];

    protected $dates = [
        'publish_date'
    ];

    public function createdByEntity()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
