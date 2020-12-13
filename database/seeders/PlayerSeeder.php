<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlayerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i < 4; $i++) {
            for ($f=0; $f < 11; $f++) {
                DB::table('players')->insert([
                    'first_name' => Str::random(10),
                    'last_name' => Str::random(10),
                    'team_id' => $i,
                ]);
            }

        }
    }
}
