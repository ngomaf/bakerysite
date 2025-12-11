<main class="container py-5">
      <?php
      // Espera-se que AboutController envie a variável $about (objeto ou array)
      $aboutData = $about ?? null;
      if (!$aboutData) :
      ?>
        <div class="alert alert-warning">Informações da empresa não encontradas.</div>
      <?php else:
          $company = is_object($aboutData) ? ($aboutData->company_name ?? '') : ($aboutData['company_name'] ?? 'Umbala do Pão');
          $slogan = is_object($aboutData) ? ($aboutData->slogan ?? '') : ($aboutData['slogan'] ?? '');
          $description = is_object($aboutData) ? ($aboutData->description ?? '') : ($aboutData['description'] ?? '');
          $mission = is_object($aboutData) ? ($aboutData->mission ?? '') : ($aboutData['mission'] ?? '');
          $vision = is_object($aboutData) ? ($aboutData->vision ?? '') : ($aboutData['vision'] ?? '');
          $address = is_object($aboutData) ? ($aboutData->address ?? '') : ($aboutData['address'] ?? '');
          $phone = is_object($aboutData) ? ($aboutData->phone ?? '') : ($aboutData['phone'] ?? '');
          $email = is_object($aboutData) ? ($aboutData->email ?? '') : ($aboutData['email'] ?? '');
      ?>

      <div class="bg-white p-4 rounded shadow-sm mb-4">
        <div class="row g-4 align-items-center">
          <div class="col-md-5">
            <img src="/assets/images/banner.webp" alt="<?= htmlspecialchars($company) ?>" class="img-fluid rounded" style="width:100%;height:300px;object-fit:cover;">
          </div>
          <div class="col-md-7">
            <h1 class="h2 mb-2"><?= htmlspecialchars($company) ?></h1>
            <?php if (!empty($slogan)): ?>
              <p class="lead text-muted mb-3"><?= htmlspecialchars($slogan) ?></p>
            <?php endif; ?>
            <?php if (!empty($description)): ?>
              <p class="mb-0"><?= nl2br(htmlspecialchars($description)) ?></p>
            <?php endif; ?>
            <div class="mt-3">
              <a href="#contato" class="btn btn-sm btn-primary me-2">Entrar em contato</a>
              <a href="#equipe" class="btn btn-sm btn-outline-secondary">Conheça a equipe</a>
            </div>
          </div>
        </div>
      </div>

      <div class="row g-3 mb-3">
        <div class="col-md-6">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <h3 class="h6">Missão</h3>
              <p class="mb-0 small text-muted"><?= nl2br(htmlspecialchars($mission)) ?></p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
              <h3 class="h6">Visão</h3>
              <p class="mb-0 small text-muted"><?= nl2br(htmlspecialchars($vision)) ?></p>
            </div>
          </div>
        </div>
      </div>

      <div id="contato" class="row g-3 mb-4">
        <div class="col-md-12">
          <div class="card border-0 shadow-sm">
            <div class="card-body">
              <h3 class="h6 mb-2">Contato</h3>
              <p class="mb-0 small text-muted">
                <?php if (!empty($address)): ?>
                  <strong>Endereço:</strong> <?= nl2br(htmlspecialchars($address)) ?><br>
                <?php endif; ?>
                <?php if (!empty($phone)): ?>
                  <strong>Telefone:</strong> <?= htmlspecialchars($phone) ?><br>
                <?php endif; ?>
                <?php if (!empty($email)): ?>
                  <strong>Email:</strong> <?= htmlspecialchars($email) ?><br>
                <?php endif; ?>
              </p>
            </div>
          </div>
        </div>
      </div>

      <div id="equipe" class="mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h3 class="h5 mb-0">Nossa Equipe</h3>
          <small class="text-muted">Profissionais que fazem tudo virar pão</small>
        </div>

        <div class="row g-3">
          <?php if (!empty($teamMembers) && is_array($teamMembers)): ?>
            <?php foreach ($teamMembers as $member):
              $m_name = is_object($member) ? ($member->name ?? '') : ($member['name'] ?? '');
              $m_role = is_object($member) ? ($member->role ?? ($member->position ?? '')) : ($member['role'] ?? ($member['position'] ?? ''));
              $m_image = is_object($member) ? ($member->image ?? '') : ($member['image'] ?? '');
              if (empty($m_image)) {
                $m_image = '/assets/images/team/default.jpg';
              }
            ?>
            <div class="col-sm-6 col-md-4">
              <div class="card h-100 text-center border-0">
                <div class="card-body py-3">
                  <img src="<?= htmlspecialchars($m_image) ?>" alt="<?= htmlspecialchars($m_name) ?>" class="rounded-circle mb-2" style="width:130px;height:130px;object-fit:cover;border:3px solid #f8f9fa;">
                  <h6 class="mb-0"><?= htmlspecialchars($m_name) ?></h6>
                  <?php if (!empty($m_role)): ?><small class="text-muted"><?= htmlspecialchars($m_role) ?></small><?php endif; ?>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
          <?php else: ?>
          <div class="col-sm-6 col-md-4">
            <div class="card h-100 text-center border-0">
              <div class="card-body py-3">
                <img src="/assets/images/team/joao-umbala.jpg" alt="João Umbala" class="rounded-circle mb-2" style="width:130px;height:130px;object-fit:cover;border:3px solid #f8f9fa;">
                <h6 class="mb-0">João Umbala</h6>
                <small class="text-muted">Fundador & Mestre Padeiro</small>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-4">
            <div class="card h-100 text-center border-0">
              <div class="card-body py-3">
                <img src="/assets/images/team/maria-silva.jpg" alt="Maria Silva" class="rounded-circle mb-2" style="width:130px;height:130px;object-fit:cover;border:3px solid #f8f9fa;">
                <h6 class="mb-0">Maria Silva</h6>
                <small class="text-muted">Confeiteira</small>
              </div>
            </div>
          </div>

          <div class="col-sm-6 col-md-4">
            <div class="card h-100 text-center border-0">
              <div class="card-body py-3">
                <img src="/assets/images/team/carlos-sousa.jpg" alt="Carlos Souza" class="rounded-circle mb-2" style="width:130px;height:130px;object-fit:cover;border:3px solid #f8f9fa;">
                <h6 class="mb-0">Carlos Souza</h6>
                <small class="text-muted">Atendimento</small>
              </div>
            </div>
          </div>
          <?php endif; ?>
        </div>
      </div>

      <?php endif; ?>

    </main>
