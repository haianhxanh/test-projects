<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class JobPositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        {
            $path = public_path('database/jobs-portal.sql');
            $sql = file_get_contents($path);
            DB::unprepared($sql);
        }
    }
}
