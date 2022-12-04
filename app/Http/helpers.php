<?php
use App\Models\User;
use App\Utils\DateHelper;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;


//get all models
function modelCollection()
{
    $output = [];
    $base_path = \base_path().'/app/Models';

    //scan all the models/entities in particular module
    $entities = \scandir($base_path);
    foreach($entities as $entity){
        if(\str_starts_with($entity,'.')) continue;  //ignore '.' and '..' files
        $output[\strtolower(\substr($entity,0,-4))] =\substr($entity,0,-4);
    }

    return $output;
}

function dateToString($date)
{
    return Carbon::parse($date)->toDateString();
}

