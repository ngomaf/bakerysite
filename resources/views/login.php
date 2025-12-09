
    <main class="container py-5">
      <div class="login-card card shadow-sm p-4">
        <h1 class="h4 mb-4 text-center">Login</h1>
        <form method="post" action="/auth/login.php">
          <div class="mb-3">
            <label for="email" class="form-label">E-mail</label>
            <input type="email" class="form-control" id="email" name="email" required autofocus>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="d-grid gap-2">
            <button type="submit" class="btn btn-primary">Entrar</button>
          </div>
        </form>
        <div class="mt-3 text-center">
          <a href="/auth/forgot.php" class="small">Esqueceu a senha?</a> | <a href="/auth/register.php" class="small">Criar conta</a>
        </div>
      </div>
    </main>
    