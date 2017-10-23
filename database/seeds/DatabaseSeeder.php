<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuario')->insert([
            'nome' => "usuario",
            'email' => 'usuario@moves.com',
            'password' => bcrypt('secret'),
            'imagem_perfil' => "perfil.jpg",
            'data_nascimento' => \Carbon\Carbon::parse('2000-01-01'),
            'tipo' => 0,
            'cpf' => '81957260629',
            'endereco' => 'RUA EXEMPLO USUARIO',
        ]);

        DB::table('usuario')->insert([
            'nome' => "empresa",
            'email' => 'empresa@moves.com',
            'password' => bcrypt('secret'),
            'imagem_perfil' => "perfil.jpg",
            'tipo' => 1,
            'cnpj' => '84211756000170',
            'endereco' => 'RUA EXEMPLO EMPRESA',
        ]);
    }
}
