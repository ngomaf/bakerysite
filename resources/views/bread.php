    <main class="container py-5">
      <?php
      // Espera-se que o controller envie a variável $bread (objeto ou array)
      if (!isset($bread) || empty($bread)):
      ?>
        <div class="alert alert-warning">Produto não encontrado.</div>
      <?php else:
          // suportar objeto (PDO::FETCH_OBJ) ou array
          $name = is_object($bread) ? ($bread->name ?? '') : ($bread['name'] ?? '');
          $description = is_object($bread) ? ($bread->description ?? '') : ($bread['description'] ?? '');
          $category = is_object($bread) ? ($bread->category ?? ($bread->type_name ?? '')) : ($bread['category'] ?? ($bread['type_name'] ?? ''));
          $weight = is_object($bread) ? ($bread->weight ?? '') : ($bread['weight'] ?? '');
          $priceRaw = is_object($bread) ? ($bread->price ?? 0) : ($bread['price'] ?? 0);
          $slug = is_object($bread) ? ($bread->slug ?? '') : ($bread['slug'] ?? '');
          $image = is_object($bread) ? ($bread->image ?? '') : ($bread['image'] ?? '');

          // formatar preço: aceita número (float/int) ou string já formatada
          if (is_numeric($priceRaw)) {
              $price = 'R$ ' . number_format((float)$priceRaw, 2, ',', '.');
          } else {
              $price = (string)$priceRaw;
          }

          if (empty($image)) {
              $image = 'https://images.unsplash.com/photo-1505250469679-203ad9ced0cb?auto=format&fit=crop&w=800&q=80';
          }
      ?>

      <div class="row mb-5 align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
          <img src="<?= htmlspecialchars($image) ?>" alt="<?= htmlspecialchars($name) ?>" class="product-img img-fluid rounded">
        </div>
        <div class="col-md-6">
          <h1 class="h3 mb-3"><?= htmlspecialchars($name) ?></h1>
          <?php if (!empty($description)): ?>
            <p class="lead"><?= htmlspecialchars($description) ?></p>
          <?php endif; ?>

          <ul class="list-unstyled mb-4">
            <?php if (!empty($category)): ?>
              <li><strong>Categoria:</strong> <?= htmlspecialchars(ucfirst($category)) ?></li>
            <?php endif; ?>
            <?php if (!empty($weight)): ?>
              <li><strong>Peso:</strong> <?= htmlspecialchars($weight) ?></li>
            <?php endif; ?>
            <li><strong>Preço:</strong> <?= htmlspecialchars($price) ?></li>
          </ul>

          <?php if (!empty($description)): ?>
            <h5 class="mb-2">Descrição</h5>
            <p><?= nl2br(htmlspecialchars($description)) ?></p>
          <?php endif; ?>

          <a href="/bread" class="btn btn-outline-primary"><i class="bi bi-arrow-left"></i> Voltar para lista de pães</a>
          <?php if (!empty($slug)): ?>
            <a href="/admin/breads/edit/<?= htmlspecialchars($slug) ?>" class="btn btn-sm btn-secondary ms-2">Editar (admin)</a>
          <?php endif; ?>
        </div>
      </div>

      <?php endif; ?>

    </main>
