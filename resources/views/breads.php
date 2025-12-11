
    <main class="container py-5">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Pães</h1>
        <div>
          <div class="btn-group" role="group" aria-label="Filtrar por categoria">
            <button type="button" class="btn btn-outline-primary category-btn active" data-category="all">Todos</button>
            <?php
              if (!empty($categories) && is_array($categories)):
                foreach ($categories as $category):
                  $cat_name = is_object($category) ? ($category->name ?? '') : ($category['name'] ?? '');
                  $cat_slug = is_object($category) ? ($category->slug ?? '') : ($category['slug'] ?? '');
                  $cat_display = ucfirst($cat_slug);
            ?>
            <button type="button" class="btn btn-outline-primary category-btn" data-category="<?= htmlspecialchars($cat_slug) ?>"><?= htmlspecialchars($cat_display) ?></button>
            <?php
                endforeach;
              endif;
            ?>
          </div>
        </div>
      </div>

      <div class="row g-4" id="products">
        <?php
        // Espera-se que $breads seja um array de objetos ou arrays associativos fornecido pelo BreadController
        $arr_breads = ['/assets/images/bolo-laranja.jpg', '/assets/images/canteiobread.jpg', '/assets/images/cornbread.jpg', '/assets/images/cornbread2.jpg', '/assets/images/croissant.jpg', '/assets/images/croissant2.jpg', '/assets/images/milkbread.jpg', '/assets/images/pao-italiano.jpg'];
        $arr_size = count($arr_breads)-1;
        
        if (!empty($breads) && is_array($breads)):
            foreach ($breads as $bread):
                // suportar objetos (PDO::FETCH_OBJ) ou arrays associativos
                $category = is_object($bread) ? ($bread->size ?? ($bread->type_slug ?? 'medio')) : ($bread['size'] ?? ($bread['type_slug'] ?? 'medio'));
                $name = is_object($bread) ? ($bread->name ?? '') : ($bread['name'] ?? '');
                $slug = is_object($bread) ? ($bread->slug ?? '') : ($bread['slug'] ?? '');
                $description = is_object($bread) ? ($bread->description ?? '') : ($bread['description'] ?? '');
                $price = is_object($bread) ? ($bread->price ?? 0) : ($bread['price'] ?? 0);
                $weight = is_object($bread) ? ($bread->weight ?? '') : ($bread['weight'] ?? '');
                // $image = is_object($bread) ? ($bread->image ?? '') : ($bread['image'] ?? '');
                
                $item_selected = random_int(0, $arr_size);
                $image = in_array($bread->image, $arr_breads) ? $bread->image : $arr_breads[$item_selected];

                $priceFmt = number_format((float)$price, 2, ',', '.');
                // fallback para imagem
                if (empty($image)) {
                    $image = '/assets/images/canteiobread.jpg';
                }
        ?>

        <div class="col-sm-6 col-md-4" data-category="<?= htmlspecialchars($category) ?>">
          <div class="card product-card h-100">
            <img src="<?= htmlspecialchars($image) ?>" class="card-img-top" alt="<?= htmlspecialchars($name) ?>">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title"><?= htmlspecialchars($name) ?></h5>
              <p class="card-text text-muted"><?= htmlspecialchars($description) ?></p>
              <div class="mt-auto d-flex justify-content-between align-items-center">
                <strong>R$ <?= htmlspecialchars($priceFmt) ?></strong>
                <a href="/bread/<?= htmlspecialchars($slug) ?>" class="btn btn-sm btn-outline-primary">Ver</a>
              </div>
            </div>
          </div>
        </div>

        <?php
            endforeach;
        else:
        ?>

        <div class="col-12">
          <div class="alert alert-info">Nenhum produto encontrado.</div>
        </div>

        <?php endif; ?>
      </div>

    </main>

    <script>
      // Filtragem simples por categoria
      document.querySelectorAll('.category-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
          document.querySelectorAll('.category-btn').forEach(b => b.classList.remove('active'));
          btn.classList.add('active');
          const cat = btn.getAttribute('data-category');
          document.querySelectorAll('#products > div').forEach(function(cardCol) {
            if (cat === 'all' || cardCol.getAttribute('data-category') === cat) {
              cardCol.style.display = '';
            } else {
              cardCol.style.display = 'none';
            }
          });
        });
      });
    </script>
