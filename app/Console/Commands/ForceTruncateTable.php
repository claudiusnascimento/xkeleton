<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Schema;
use DB;

class ForceTruncateTable extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'force:truncate {table}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate table disabling FOREIGN_KEY_CHECKS. TAKE CARE';

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
     * @return mixed
     */
    public function handle()
    {
        $table = $this->argument('table');

        if(!Schema::hasTable($table)) {
            return $this->error('Table \'' . $table . '\' doesn\'t exists');
        }

        $count = DB::table($table)->count();

        if($this->confirm('Do you realy want to delete '. $count .' entries of the table: ' . $table)) {

            try {

                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                DB::table($table)->truncate();
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');

            } catch (Exception $e) {

                $this->error($e->getMessage());
                $this->error($e->getFile());
                $this->error($e->getLine());

                return false;
            }

        }

        $this->info('Table ' . $table . ' was truncated with success. ('.$count.' entries)');
    }

}
