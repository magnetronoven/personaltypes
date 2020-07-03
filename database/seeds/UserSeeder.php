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
            'dmd' => 'Ui Ce',
            'team_id' => 1,
            'position_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'aaa',
            'lastname' => 'aaa',
            'email' => 'test@test.com',
            'password' => Hash::make('test'),
            'profile' => 'INTP',
            'dmd' => 'Ai Ce',
            'team_id' => 2,
            'position_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'bbb',
            'lastname' => 'bbb',
            'profile' => 'INTP',
            'dmd' => 'Ai Re',
            'team_id' => 2,
            'position_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        DB::table('users')->insert([
            'name' => 'ccc',
            'lastname' => 'ccc',
            'profile' => 'INTP',
            'dmd' => 'Ui Ce',
            'team_id' => 2,
            'position_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
