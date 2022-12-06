<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skills extends Model
{
    use HasFactory;

    protected $table = 'skills';

    protected $fillable = ['name', 'category_id', 'percentage', 'description', 'created_by'];

    public function skillType()
    {
        return [
            1 => 'Hard Skills',
            2 => 'Soft Skills',
        ];
    }

    public function createdByEntity()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function getSkillType()
    {
        $CategoryArr = [
            1 => 'Hard Skills',
            2 => 'Soft Skills'
        ];
        return $CategoryArr[$this->skill_type_id];
    }
}
