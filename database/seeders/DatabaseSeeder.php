<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Database\Seeders\TeamSeeder;
use Database\Seeders\RegionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        // $this->call(AreaSeeder::class);
        // $this->call(TypeSeeder::class);
        $this->call(TeamSeeder::class);
    }
}