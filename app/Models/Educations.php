<?php

namespace App\Models;

use App\Http\Traits\AuthTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Educations extends Model
{
    use HasFactory, AuthTrait, SoftDeletes;

    protected $table = 'educations';

    protected $fillable = ['course', 'start_date', 'end_date','institute', 'description', 'grade', 'total_grade', 'created_by', 'updated_by'];

    protected $dates = ['start_date', 'end_date', 'created_at', 'updated_at'];

    public function createdByEntity()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }
}
