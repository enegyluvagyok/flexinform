<?php

namespace App\Providers;

use Illuminate\Support\Facades\File;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;

class DatabaseSeedServiceProvider extends ServiceProvider
{
    private $tables;

    public function __construct()
    {
        $this->tables = ['clients', 'cars', 'services'];
    }


    public function register(): void
    {
        foreach ($this->tables as $tableName) {

            if ($this->shouldSeedTables($tableName)) {
                $this->seedTables($tableName);
            }
        }
    }

    private function shouldSeedTables($tableName)
    {
        return DB::table($tableName)->count() === 0;
    }

    private function seedTables($tableName)
    {
        $jsonFile =  storage_path() . '/' . 'seed' . '/' . $tableName . '.json';
        $data = json_decode(File::get($jsonFile), true);
        DB::table($tableName)->insert($data);
    }
}
