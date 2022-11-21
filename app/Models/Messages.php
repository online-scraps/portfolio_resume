<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Messages extends Model
{
    use HasFactory;

    protected $table = 'messages';

    protected $fillable = ['name', 'email', 'subject', 'description', 'created_by'];

    protected $dates = [
        'start_year', 'end_year'
    ];

    public function createdByEntity()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
