<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(MiniShop\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


// Categoria
$factory->define(MiniShop\Models\Categoria::class, function (Faker\Generator $faker) {
	return [
		'nomeCategoria' => $faker->unique()->word,
		'idCategoriaPai' => null,
	];
});

// Produto
$factory->define(MiniShop\Models\Produto::class, function (Faker\Generator $faker) {
	$categoria = factory(MiniShop\Models\Categoria::class)->create();
	return [
		'fotoProduto' => null,
		'nomeProduto' => $faker->unique()->word,
		'precoProduto' => $faker->randomFloat(2),
		'estoqueProduto' => 0,
		'destaqueProduto' => 0,
		'idCategoria' => $categoria->id,
	];
});

// Pessoa
$factory->define(MiniShop\Models\Pessoa::class, function (Faker\Generator $faker) {
	return [
		'nomePessoa' => $faker->name,
		'emailPessoa' => $faker->safeEmail,
		'senhaPessoa' => bcrypt($faker->password),
		'statusPessoa' => 1,
	];
});
