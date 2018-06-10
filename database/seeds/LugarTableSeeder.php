<?php

use Illuminate\Database\Seeder;

class LugarTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('place')->insert([
        	'latitude' => "-19.212355602107472",
            'longitude' => '-44.57636812499999',
            'nome' => 'restaurante 01',
            'descricao' => 'descricao de teste 01',
            'imagem' => 'default.png',
            'category_id' => 1,
            'user_id' => 2,
        ]);


        DB::table('place')->insert([
        	'latitude' => "-22.618827234831404",
            'longitude' => '-42.57636812499999',
            'nome' => 'hospital 01',
            'descricao' => 'descricao de teste 02',
            'imagem' => 'default.png',
            'category_id' => 2,
            'user_id' => 2,
        ]);


        DB::table('place')->insert([
        	'latitude' => "-22.57825604463875",
            'longitude' => '-48.68476656249999',
            'nome' => 'restaurante 02',
            'descricao' => 'descricao de teste 03',
            'imagem' => 'default.png',
            'category_id' => 1,
            'user_id' => 2,
        ]);

    }
}
