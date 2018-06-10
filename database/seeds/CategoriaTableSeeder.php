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
    }
}
