<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CoachSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('coaches')->insert([
            'user_id' => 1,
            'team_id' => 2,
        ]);

        DB::table('coaches')->insert([
            'user_id' => 2,
            'team_id' => 1,
        ]);
    }
}
