<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = ['name', 'category_id', 'link', 'description', 'created_by'];

    public static function projectCategoryType()
    {
        return [
            1 => 'Personal',
            2 => 'Professional',
        ];
    }

    public function getProjectCategoryType()
    {
        $categoryTypes = $this->projectCategoryType();
        $categoryTypeId = $this->category_id;
        return $categoryTypes[$categoryTypeId];
    }

    public function createdByEntity()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
