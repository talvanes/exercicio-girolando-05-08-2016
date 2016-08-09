<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// somente visitantes
Route::resource('/', 'System\HomeController', 
	['only' => ['index', 'store'], 'names' => ['index' => 'home.index', 'store' => 'home.store']]
);

Route::resource('categoria', 'System\CategoriaController', [ 'only' => 'show', 'parameters' => ['categoria' => 'id']]);
Route::resource('produto', 'System\ProdutoController', [ 'only' => 'show', 'parameters' => ['produto' => 'id']]);

Route::resource('meu-carrinho', 'System\CarrinhoController', [ 'only' => 'index', 'names' => ['index' => 'meu-carrinho']]);
Route::resource('carrinho', 'System\CarrinhoController', 
	[ 'only' => ['store', 'update'], 'parameters' => ['carrinho' => 'produto'] ]
);

// para usuários autenticados
Route::group(['middleware' => 'autentica'], function(){

	Route::resource('dashboard', 'System\Dashboard\DashboardController', ['only' => 'index']);
	Route::group(['prefix' => 'dashboard'], function(){
		Route::resource('categorias', 'System\Dashboard\CategoriaController');
		Route::resource('produtos', 'System\Dashboard\ProdutoController');
		Route::resource('logout', 'System\Dashboard\LogoutController', 
			['only' => 'store', 'names' => [ 'store' => 'dashboard.logout']]
		);
	});

});
