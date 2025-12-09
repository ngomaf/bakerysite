            
		<main>
            <!-- Hero / Banner -->
			<section class="hero">
				<div class="hero-overlay text-white">
					<div class="container text-center">
						<h1 class="display-5 fw-bold">Umbala do Pão</h1>
						<p class="lead">Pães artesanais, bolos e doces preparados com carinho todos os dias.</p>
						<a href="/bread" class="btn btn-primary btn-lg">Conheça nosso cardápio</a>
					</div>
				</div>
			</section>

			<!-- Produtos em Destaque -->
			<section class="container py-5">
				<div class="d-flex justify-content-between align-items-center mb-4">
					<h2 class="h4">Em Destaque</h2>
					<a href="/bread" class="text-decoration-none">Ver mais &raquo;</a>
				</div>

				<div class="row g-4">
					<?php
					// Espera-se que $breads seja um array de objetos ou arrays associativos fornecido pelo HomeController
					if (!empty($breads) && is_array($breads)):
						$max = 3; $count = 0;
						foreach ($breads as $bread):
							if ($count++ >= $max) break;
							$name = is_object($bread) ? ($bread->name ?? '') : ($bread['name'] ?? '');
							$slug = is_object($bread) ? ($bread->slug ?? '') : ($bread['slug'] ?? '');
							$description = is_object($bread) ? ($bread->description ?? '') : ($bread['description'] ?? '');
							$price = is_object($bread) ? ($bread->price ?? 0) : ($bread['price'] ?? 0);
							$image = is_object($bread) ? ($bread->image ?? '') : ($bread['image'] ?? '');
							$priceFmt = 'R$ ' . number_format((float)$price, 2, ',', '.');
							if (empty($image)) {
								$image = 'https://images.unsplash.com/photo-1505250469679-203ad9ced0cb?auto=format&fit=crop&w=600&q=80';
							}
					?>
					<div class="col-md-4">
						<div class="card product-card">
							<img src="<?= htmlspecialchars($image) ?>" class="card-img-top" alt="<?= htmlspecialchars($name) ?>">
							<div class="card-body">
								<h5 class="card-title"><?= htmlspecialchars($name) ?></h5>
								<p class="card-text text-muted"><?= htmlspecialchars($description) ?></p>
								<div class="d-flex justify-content-between align-items-center">
									<strong><?= htmlspecialchars($priceFmt) ?></strong>
									<a href="/bread/<?= htmlspecialchars($slug) ?>" class="btn btn-sm btn-outline-primary">Detalhes</a>
								</div>
							</div>
						</div>
					</div>
					<?php
						endforeach;
					else:
					?>
					<div class="col-12">
						<div class="alert alert-info">Nenhum produto em destaque.</div>
					</div>
					<?php endif; ?>
				</div>
			</section>

			<!-- Informações de contato / horário -->
			<section class="bg-light py-4">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h3 class="h5">Endereço</h3>
							<p>Rua Exemplo, 123 — Centro<br> Cidade — Estado</p>
						</div>
						<div class="col-md-6">
							<h3 class="h5">Horário de Funcionamento</h3>
							<p>Seg–Sex: 06:30–19:00<br>Sáb: 06:30–16:00<br>Dom: 07:00–12:00</p>
						</div>
					</div>
				</div>
			</section>

		</main>