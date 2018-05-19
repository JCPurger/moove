<?php

use Illuminate\Database\Seeder;

class FavorioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('favorite')->insert([
            'user_id' => 1,
            'place_id' => 1,
        ]);

        DB::table('favorite')->insert([
            'user_id' => 1,
            'place_id' => 2,
        ]);

        DB::table('favorite')->insert([
            'user_id' => 2,
            'place_id' => 2,
        ]);

        DB::table('favorite')->insert([
            'user_id' => 2,
            'place_id' => 3,
        ]);
    }
}
