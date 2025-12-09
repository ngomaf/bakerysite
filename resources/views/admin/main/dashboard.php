<!doctype html>
<html lang="pt-BR">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Umbala do Pão — Dashboard Admin</title>
    <meta name="description" content="Painel administrativo da Umbala do Pão.">
    <link href="/assets/bootstrap5/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="/assets/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <style>
      .dashboard-card { min-height: 120px; }
    </style>
  </head>
  <body>
    <header class="bg-white shadow-sm mb-4">
      <nav class="container navbar navbar-expand-lg navbar-light">
        <a class="navbar-brand fw-bold" href="/admin/main/dashboard.php">Umbala do Pão <span class="text-primary">Admin</span></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navMain">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navMain">
          <ul class="navbar-nav ms-auto">
            <li class="nav-item"><a class="nav-link active" href="/admin/main/dashboard.php">Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="/admin/produtos.php">Produtos</a></li>
            <li class="nav-item"><a class="nav-link" href="/admin/categorias.php">Categorias</a></li>
            <li class="nav-item"><a class="nav-link" href="/admin/mensagens.php">Mensagens</a></li>
            <li class="nav-item"><a class="nav-link" href="/admin/logout.php">Sair</a></li>
          </ul>
        </div>
      </nav>
    </header>
    <main class="container py-4">
      <h1 class="h3 mb-4">Dashboard</h1>
      <div class="row g-4 mb-4">
        <div class="col-md-3">
          <div class="card dashboard-card shadow-sm text-center p-3">
            <div class="mb-2"><i class="bi bi-bag-fill fs-2 text-primary"></i></div>
            <div class="fw-bold">Produtos</div>
            <div class="text-muted">42 cadastrados</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card dashboard-card shadow-sm text-center p-3">
            <div class="mb-2"><i class="bi bi-tags-fill fs-2 text-success"></i></div>
            <div class="fw-bold">Categorias</div>
            <div class="text-muted">6 categorias</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card dashboard-card shadow-sm text-center p-3">
            <div class="mb-2"><i class="bi bi-envelope-fill fs-2 text-warning"></i></div>
            <div class="fw-bold">Mensagens</div>
            <div class="text-muted">12 não lidas</div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card dashboard-card shadow-sm text-center p-3">
            <div class="mb-2"><i class="bi bi-person-circle fs-2 text-secondary"></i></div>
            <div class="fw-bold">Usuários</div>
            <div class="text-muted">3 admins</div>
          </div>
        </div>
      </div>
      <div class="card p-4 mb-4">
        <h2 class="h5 mb-3">Bem-vindo ao painel administrativo!</h2>
        <p>Aqui você pode gerenciar produtos, categorias, visualizar mensagens de contato e administrar usuários do sistema.</p>
      </div>
    </main>
    <footer class="bg-white py-4 mt-4 border-top">
      <div class="container d-flex justify-content-between align-items-center">
        <small class="text-muted">&copy; Umbala do Pão — Admin</small>
        <div>
          <a href="#" class="text-decoration-none me-2">Facebook</a>
          <a href="#" class="text-decoration-none">Instagram</a>
        </div>
      </div>
    </footer>
    <script src="/assets/bootstrap5/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
