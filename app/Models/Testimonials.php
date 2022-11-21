<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonials extends Model
{
    use HasFactory;

    protected $table = 'testimonials';

    protected $fillable = ['name', 'image', 'rating', 'description', 'created_by'];

    public function createdByEntity()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
