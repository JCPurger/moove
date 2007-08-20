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
        DB::table('favorito')->insert([
            'user_id' => 1,
            'lugar_id' => 1,
        ]);

        DB::table('favorito')->insert([
            'user_id' => 1,
            'lugar_id' => 2,
        ]);

        DB::table('favorito')->insert([
            'user_id' => 2,
            'lugar_id' => 2,
        ]);

        DB::table('favorito')->insert([
            'user_id' => 2,
            'lugar_id' => 3,
        ]);
    }
}
