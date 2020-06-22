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
        $this->call(RoleSeeder::class);
        $this->call(PositionSeeder::class);
        $this->call(TeamSeeder::class);
        $this->call(CatagorySeeder::class);
        $this->call(ThemeSeeder::class);
        $this->call(TypeSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(CoachSeeder::class);
        $this->call(RoleUserSeeder::class);
    }
}
