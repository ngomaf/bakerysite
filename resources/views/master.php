<!doctype html>
<html lang="pt-AO">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?= $title ?> - Umbala do Pão</title>
		<meta name="description" content="Padaria Umbala do Pão — pães artesanais, bolos e doces frescos. Conheça nosso cardápio e faça encomendas.">
		<!-- Bootstrap 5 local -->
		<link href="/assets/bootstrap5/dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="/assets/bootstrap-icons/bootstrap-icons.css">
		<link rel="stylesheet" href="/assets/css/style.css">
	</head>
	<body>

		<header class="bg-white shadow-sm">
			<nav class="container navbar navbar-expand-lg navbar-light">
				<a class="navbar-brand fw-bold" href="/">Umbala do Pão</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navMain">
					<ul class="navbar-nav ms-auto">
							<li class="nav-item"><a class="nav-link" href="/">Home</a></li>
							<li class="nav-item dropdown">
								<a class="nav-link dropdown-toggle" href="#" id="paesDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Pães</a>
								<ul class="dropdown-menu" aria-labelledby="paesDropdown">
									<li><a class="dropdown-item" href="/bread/type/big">Pães grande</a></li>
									<li><a class="dropdown-item" href="/bread/type/middle">Pães médio</a></li>
									<li><a class="dropdown-item" href="/bread/type/small">Pães pequeno</a></li>
								</ul>
							</li>
							<li class="nav-item"><a class="nav-link" href="/about">Sobre</a></li>
							<li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
					</ul>
				</div>
			</nav>
		</header>

        
            <?php require VIEWS . '/' . $page . '.php'; ?>


		<footer class="bg-white py-4 mt-4 border-top">
			<div class="container d-flex justify-content-between align-items-center">
				<small class="text-muted">&copy; Umbala do Pão — Todos os direitos reservados</small>
				<div>
					<a href="#" class="text-decoration-none me-2">Facebook</a>
					<a href="#" class="text-decoration-none">Instagram</a>
				</div>
			</div>
		</footer>

		<script src="/assets/bootstrap5/dist/js/bootstrap.bundle.min.js"></script>
	</body>
</html>
