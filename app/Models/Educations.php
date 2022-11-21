<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Educations extends Model
{
    use HasFactory;

    protected $table = 'educations';

    protected $fillable = ['course', 'institute', 'description', 'grade', 'total_grade', 'created_by'];

    protected $dates = [
        'start_year', 'end_year'
    ];
    
    public function createdByEntity()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
