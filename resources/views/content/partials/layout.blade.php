<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<title>MiniShop - yet another e-shop</title>
	<link rel="stylesheet" href="css/main.css">
	@yield('css')
</head>
<body>
	<!-- Cabeçalho -->
	<header>
		<form method="post" action="{!! route('home.store') !!}" accept-charset="utf-8">
			<label for="login">Login</label>
			<!-- Email -->
			<input type="email" name="emailPessoa" placeholder="Email" />
			<!-- Senha -->
			<input type="password" name="senhaPessoa" placeholder="Senha" />
			<!-- Botão Entrar -->
			<button type="submit">Entrar</button>
		</form>
	</header>

	<!-- Conteúdo -->
	<main>
		<!-- Mensagens de erro -->
		@if(count($errors) > 0)
			<ul>
			@foreach($errors->all() as $error)
				<li>{{ $error }}</li>
			@endforeach
			</ul>
		@endif
		<!-- Mensagens de sessão -->
		@if(Session::has('error'))
			<p>{{ Session::get('error') }}</p>
		@elseif (Session::has('success'))
			<p>{{ Session::get('success') }}</p>
		@endif
	</main>

	
	
	<!-- Rodapé -->
	<footer>
		
	</footer>

	<script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
	<script src="js/main.js"></script>
	@yield('javascript')
</body>
</html