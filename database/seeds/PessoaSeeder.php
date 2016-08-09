<?php

use Illuminate\Database\Seeder;
use MiniShop\Models\Pessoa;

class PessoaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pessoa::create([
        	'nomePessoa' => 'Administrador',
        	'emailPessoa' => 'admin@example.net',
        	'senhaPessoa' => bcrypt('123456'),
        	'statusPessoa' => 1,
        ]);
    }
}
