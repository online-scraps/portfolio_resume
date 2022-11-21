<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialMedias extends Model
{
    use HasFactory;

    protected $table = 'social_medias';

    protected $fillable = ['name', 'link', 'icon', 'created_by'];

    public function createdByEntity()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
