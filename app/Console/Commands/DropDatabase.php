<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Illuminate\Support\Facades\DB;

class DropDatabase extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'database:drop {database?}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Drop a database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $databaseName = $this->argument('database') ?: env('DB_DATABASE');
        DB::statement("DROP DATABASE IF EXISTS $databaseName");
        $this->info("The $databaseName database has been dropped!");
    
    }
}
