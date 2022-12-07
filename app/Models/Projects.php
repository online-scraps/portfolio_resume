<?php

namespace App\Models;

use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Projects extends Model
{
    use HasFactory, HasRoles;

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
        return $this->projectCategoryType()[$this->category_id];
    }

    public function createdByEntity()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

}
