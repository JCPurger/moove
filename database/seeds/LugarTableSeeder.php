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
        	'latitude' => "-22.9036391",
            'longitude' => '-43.1842203',
            'nome' => 'restaurante 01',
            'descricao' => 'descricao de teste 01',
            'imagem' => 'default.png',
            'category_id' => 1,
            'user_id' => 2,
        ]);


        DB::table('place')->insert([
        	'latitude' => "-23.0000961",
            'longitude' => '-43.3839735',
            'nome' => 'hospital 01',
            'descricao' => 'descricao de teste 02',
            'imagem' => 'default.png',
            'category_id' => 2,
            'user_id' => 2,
        ]);


        DB::table('place')->insert([
        	'latitude' => "-22.8922428",
            'longitude' => '-43.3243146',
            'nome' => 'restaurante 02',
            'descricao' => 'descricao de teste 03',
            'imagem' => 'default.png',
            'category_id' => 1,
            'user_id' => 2,
        ]);

    }
}
