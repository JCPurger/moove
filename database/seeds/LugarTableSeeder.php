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
            'nome' => 'lugar_teste',
            'categoria' => 'restaurante',
            'descricao' => 'descricao de teste',
        ]);


        DB::table('lugar')->insert([
        	'latitude' => "-22.618827234831404",
            'longitude' => '-42.57636812499999',
            'nome' => 'lugar_teste',
            'categoria' => 'hospital',
            'descricao' => 'descricao de teste',
        ]);


        DB::table('lugar')->insert([
        	'latitude' => "-22.57825604463875",
            'longitude' => '-48.68476656249999',
            'nome' => 'lugar_teste',
            'categoria' => 'restaurante',
            'descricao' => 'descricao de teste',
        ]);

    }
}
