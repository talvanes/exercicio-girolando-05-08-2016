<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>MiniShop - yet another e-shop</title>
	<link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<link rel="stylesheet" href="css/main.css">
	@yield('css')
</head>
<body class="w3-container w3-light-blue">
	<!-- Cabeçalho -->
	<header class="w3-container">
		<!-- Logomarca -->

		@if(Auth::check())
			<!-- Botões Categoria e Produtos -->
		@endif

	</header>

	<!-- Conteúdo -->
	<main class="w3-container w3-row-padding">
		
		<!-- Painel lateral com o link "Meu Carrinho" e as categorias -->
		<aside class="w3-quarter">
			<!-- Link "Meu Carrinho" -->
			<a href="{!! route('meu-carrinho') !!}" class="w3-btn">
				<i class="fa fa-shopping-cart"></i> Meu Carrinho
			</a>

			<!-- Lista de categorias -->
			@include('content.partials.categories')
		</aside>

		<!-- Conteúdo do meio -->
		<section class="w3-half w3-blue">
			@yield('content')
		</section>

		<!-- À direita, formulário de login -->
		<aside class="w3-quarter">
			<form method="POST" action="{!! route('home.store') !!}" class="w3-container w3-light-grey">
				<!-- Email -->
				<label class="w3-label" for="login">Login</label>
				<input type="email" name="emailPessoa" class="w3-input w3-border" id="login" />
				<!-- Senha -->
				<label class="w3-label" for="senha">Senha</label>
				<input type="password" name="senhaPessoa" class="w3-input w3-border" id="senha" />

				<button class="w3-btn" type="submit"><i class="fa fa-sign-in"></i> Entrar</button>
			</form>
		</aside>

	</main>

	
	
	<!-- Rodapé -->
	<footer class="w3-container">
		
	</footer>

	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script src="js/kickstart.js"></script>
	<script src="js/main.js"></script>
	@yield('javascript')
</body>
</html