<?php

use Illuminate\Database\Seeder;

class CategoriaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('category')->insert([
            'nome' => 'hospital',
        ]);

        DB::table('category')->insert([
            'nome' => 'resturante',
        ]);

        DB::table('category')->insert([
            'nome' => 'cinema',
        ]);

        DB::table('category')->insert([
            'nome' => 'bar',
        ]);

        DB::table('category')->insert([
            'nome' => 'igreja',
        ]);

        DB::table('category')->insert([
            'nome' => 'praça',
        ]);

        DB::table('category')->insert([
            'nome' => 'museu',
        ]);

        DB::table('category')->insert([
            'nome' => 'metrô',
        ]);

        DB::table('category')->insert([
            'nome' => 'aeroporto',
        ]);

        DB::table('category')->insert([
            'nome' => 'parque',
        ]);
    }
}
