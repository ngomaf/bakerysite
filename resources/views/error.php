
                <main>
                        <section class="error-hero">
                                <div class="container error-box text-center">
                                        <h1 class="display-4 text-danger"><?= htmlspecialchars($title ?? 'Erro') ?></h1>
                                        <p class="lead text-muted"><?= htmlspecialchars($description ?? 'Ocorreu um erro inesperado. Por favor, tente novamente mais tarde.') ?></p>
                                        <div class="mt-4">
                                                <a href="/" class="btn btn-primary me-2">Ir para Home</a>
                                                <a href="javascript:history.back()" class="btn btn-outline-secondary">Voltar</a>
                                        </div>
                                        <?php if (!empty($details)): ?>
                                                <div class="mt-4 text-start small text-muted">
                                                        <strong>Detalhes:</strong>
                                                        <pre style="white-space:pre-wrap;"><?= htmlspecialchars($details) ?></pre>
                                                </div>
                                        <?php endif ?>
                                </div>
                        </section>
                </main>
