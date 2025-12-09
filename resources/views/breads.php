
    <main class="container py-5">
      <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="h3 mb-0">Pães</h1>
        <div>
          <div class="btn-group" role="group" aria-label="Filtrar por categoria">
            <button type="button" class="btn btn-outline-primary category-btn active" data-category="all">Todos</button>
            <button type="button" class="btn btn-outline-primary category-btn" data-category="grande">Grande</button>
            <button type="button" class="btn btn-outline-primary category-btn" data-category="medio">Médio</button>
            <button type="button" class="btn btn-outline-primary category-btn" data-category="pequeno">Pequeno</button>
          </div>
        </div>
      </div>

      <div class="row g-4" id="products">
        <!-- Card templates with data-category attribute -->
        <div class="col-sm-6 col-md-4" data-category="grande">
          <div class="card product-card h-100">
            <img src="https://images.unsplash.com/photo-1519864600265-abb23847ef2c?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Pão Italiano">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Pão Italiano</h5>
              <p class="card-text text-muted">Crosta crocante, miolo aerado.</p>
              <div class="mt-auto d-flex justify-content-between align-items-center">
                <strong>R$ 8,50</strong>
                <a href="/bread/pao-italiano" class="btn btn-sm btn-outline-primary">Ver</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4" data-category="medio">
          <div class="card product-card h-100">
            <img src="https://images.unsplash.com/photo-1523986371872-9d3ba2e2f642?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Pão de Centeio">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Pão de Centeio</h5>
              <p class="card-text text-muted">Sabor intenso e textura rústica.</p>
              <div class="mt-auto d-flex justify-content-between align-items-center">
                <strong>R$ 7,00</strong>
                <a href="/bread/pao-centeio" class="btn btn-sm btn-outline-primary">Ver</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4" data-category="pequeno">
          <div class="card product-card h-100">
            <img src="https://images.unsplash.com/photo-1511379938547-c1f69419868d?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Croissant">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Croissant</h5>
              <p class="card-text text-muted">Folhado amanteigado, macio.</p>
              <div class="mt-auto d-flex justify-content-between align-items-center">
                <strong>R$ 6,00</strong>
                <a href="/bread/croissant" class="btn btn-sm btn-outline-primary">Ver</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4" data-category="grande">
          <div class="card product-card h-100">
            <img src="https://images.unsplash.com/photo-1542838687-3d7a0f0c9a3f?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Pão Campesino">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Pão Campesino</h5>
              <p class="card-text text-muted">Feito com fermentação natural.</p>
              <div class="mt-auto d-flex justify-content-between align-items-center">
                <strong>R$ 12,00</strong>
                <a href="/bread/pao-campesino" class="btn btn-sm btn-outline-primary">Ver</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4" data-category="medio">
          <div class="card product-card h-100">
            <img src="https://images.unsplash.com/photo-1604908177522-8b2f6a8b1f1b?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Pão de Milho">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Pão de Milho</h5>
              <p class="card-text text-muted">Sabor suave, ótimo com manteiga.</p>
              <div class="mt-auto d-flex justify-content-between align-items-center">
                <strong>R$ 6,50</strong>
                <a href="/bread/pao-milho" class="btn btn-sm btn-outline-primary">Ver</a>
              </div>
            </div>
          </div>
        </div>

        <div class="col-sm-6 col-md-4" data-category="pequeno">
          <div class="card product-card h-100">
            <img src="https://images.unsplash.com/photo-1606756790737-8a2d5b8f2a1f?auto=format&fit=crop&w=600&q=80" class="card-img-top" alt="Pão de Leite">
            <div class="card-body d-flex flex-column">
              <h5 class="card-title">Pão de Leite</h5>
              <p class="card-text text-muted">Fofinho e ideal para lanches.</p>
              <div class="mt-auto d-flex justify-content-between align-items-center">
                <strong>R$ 4,00</strong>
                <a href="/bread/pao-leite" class="btn btn-sm btn-outline-primary">Ver</a>
              </div>
            </div>
          </div>
        </div>

        <!-- Adicione mais cards conforme necessário -->
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

