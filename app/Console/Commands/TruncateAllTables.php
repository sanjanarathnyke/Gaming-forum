<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class TruncateAllTables extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'db:truncate-all {--force : Force the operation without confirmation}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Truncate all tables in the database while preserving structure';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        if (!$this->option('force')) {
            if (!$this->confirm('This will delete all data from your database. Do you want to continue?')) {
                $this->info('Operation cancelled.');
                return;
            }
        }

        $this->info('Starting database truncation...');

        try {
            $driver = DB::getDriverName();
            $truncatedCount = 0;

            // Disable foreign key checks based on database driver
            if ($driver === 'mysql') {
                DB::statement('SET FOREIGN_KEY_CHECKS=0;');
            } elseif ($driver === 'sqlite') {
                DB::statement('PRAGMA foreign_keys=OFF;');
            }

            // Get all table names based on database driver
            if ($driver === 'mysql') {
                $tables = DB::select('SHOW TABLES');
                $databaseName = DB::getDatabaseName();
                $tableKey = 'Tables_in_' . $databaseName;
                $tableNames = array_map(fn($table) => $table->$tableKey, $tables);
            } elseif ($driver === 'sqlite') {
                $tables = DB::select("SELECT name FROM sqlite_master WHERE type='table' AND name NOT LIKE 'sqlite_%'");
                $tableNames = array_map(fn($table) => $table->name, $tables);
            } else {
                $this->error('Unsupported database driver: ' . $driver);
                return 1;
            }

            foreach ($tableNames as $tableName) {
                // Skip migrations table to preserve migration history
                if ($tableName === 'migrations') {
                    $this->warn("Skipped: {$tableName}");
                    continue;
                }

                DB::table($tableName)->truncate();
                $this->info("Truncated: {$tableName}");
                $truncatedCount++;
            }

            // Re-enable foreign key checks
            if ($driver === 'mysql') {
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            } elseif ($driver === 'sqlite') {
                DB::statement('PRAGMA foreign_keys=ON;');
            }

            $this->newLine();
            $this->info("✓ Successfully truncated {$truncatedCount} tables!");
            $this->info('Database structure preserved.');

        } catch (\Exception $e) {
            // Re-enable foreign keys on error
            try {
                $driver = DB::getDriverName();
                if ($driver === 'mysql') {
                    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                } elseif ($driver === 'sqlite') {
                    DB::statement('PRAGMA foreign_keys=ON;');
                }
            } catch (\Exception $cleanupException) {
                // Ignore cleanup errors
            }
            
            $this->error('Error: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }
}
