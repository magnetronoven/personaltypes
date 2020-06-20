<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('types')->insert([
            'keywords' => 'Vanuit onder',
            'description' => 'Je moet vanuit onder passen.',
            'hyperlink' => 'https://vtcwoerden.nl',
            'connected_mbti' => 'I',
            'theme_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
        
        DB::table('types')->insert([
            'keywords' => 'boven passen',
            'description' => 'Je moet vanuit boven passen.',
            'hyperlink' => 'https://vtcwoerden.nl',
            'connected_mbti' => 'E',
            'theme_id' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
