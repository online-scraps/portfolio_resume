<?php

namespace App\Console\Commands;

use App\Models\MenuItem;
use Illuminate\Console\Command;
use Doctrine\Inflector\Inflector;
use Spatie\Permission\Models\Permission;
use Doctrine\Inflector\NoopWordInflector;


class GeneratePermissions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:permissions';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Generating Permissions .....');

        $models = modelCollection();

        foreach($models as $key=>$name){
            $array_value = ['list','create','update','delete'];

            foreach($array_value as $value){
                Permission::firstOrCreate(
                    ['name'=>$value . ' ' . $key,
                    'guard_name'=>'web'],
                );
            }
        }

        $this->info("\n\nPermissions successfully created !!!!");


    }
}
