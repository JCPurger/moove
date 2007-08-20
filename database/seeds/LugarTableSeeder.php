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
        DB::table('lugar')->insert([
        	'latitude' => "-19.212355602107472",
            'longitude' => '-44.57636812499999',
            'nome' => 'restaurante 01',
            'categoria' => 'restaurante',
            'descricao' => 'descricao de teste 01',
            'imagem' => 'default.png',
            'user_id' => 2,
        ]);


        DB::table('lugar')->insert([
        	'latitude' => "-22.618827234831404",
            'longitude' => '-42.57636812499999',
            'nome' => 'hospital 01',
            'categoria' => 'hospital',
            'descricao' => 'descricao de teste 02',
            'imagem' => 'default.png',
            'user_id' => 2,
        ]);


        DB::table('lugar')->insert([
        	'latitude' => "-22.57825604463875",
            'longitude' => '-48.68476656249999',
            'nome' => 'restaurante 02',
            'categoria' => 'restaurante',
            'descricao' => 'descricao de teste 03',
            'imagem' => 'default.png',
            'user_id' => 2,
        ]);

    }
}
