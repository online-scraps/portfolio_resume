<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Experiences extends Model
{
    use HasFactory;

    protected $table = 'experiences';

    protected $fillable = ['job_title', 'company_name', 'description', 'created_by'];

    protected $dates = [
        'start_date', 'end_date'
    ];

    public function createdByEntity()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
