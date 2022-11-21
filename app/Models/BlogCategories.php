<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BlogCategories extends Model
{
    use HasFactory;

    protected $table = 'blog_categories';

    protected $fillable = ['title', 'description', 'meta_title', 'meta_description', 'meta_keyword', 'created_by'];

    public function createdByEntity()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
