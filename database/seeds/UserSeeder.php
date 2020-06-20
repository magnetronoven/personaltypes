<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Thierry',
            'lastname' => 'Rietveld',
            'email' => 'thierry.rietveld0505@gmail.com',
            'password' => Hash::make('test'),
            'profile' => 'INTP',
            'team_id' => 1,
            'position_id' => 1,
            'role_id' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
