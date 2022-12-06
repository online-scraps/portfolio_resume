<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;

    protected $table = 'services';

    protected $fillable = ['name', 'icon', 'description', 'created_by'];

    public function createdByEntity()
    {
        return $this->belongsTo(User::class, 'created_by', 'id');
    }

    public function getServiceName($serviceId)
    {
        $service = Services::find($serviceId);
        if ($service){
            return $service->name;
        }else{
            return "No Name";
        }
    }

    public function getServiceIcon($serviceId)
    {
        $service = Services::find($serviceId);
        if ($service){
            return $service->icon;
        }else{
            return "No Name";
        }
    }

    public function getServiceDescription($serviceId)
    {
        $service = Services::find($serviceId);
        if ($service){
            return $service->description;
        }else{
            return "No Name";
        }
    }

    public function getserviceValue($serviceId)
    {
        # code...
    }
}
