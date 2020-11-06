<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(SportsSeeder::class);
        $this->call(CountrySeeder::class);
        $this->call(ChampionshipSeeder::class);
        $this->call(CommandSeeder::class);
        $this->call(ForecastSeeder::class);
    }
}
