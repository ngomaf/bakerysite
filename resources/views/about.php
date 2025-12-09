
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

      <div class="row mb-5 align-items-center">
        <div class="col-md-6 mb-4 mb-md-0">
          <img src="/assets/images/banner.webp" alt="<?= htmlspecialchars($company) ?>" class="about-img img-fluid rounded">
        </div>
        <div class="col-md-6">
          <h1 class="h3 mb-3"><?= htmlspecialchars($company) ?></h1>
          <?php if (!empty($slogan)): ?>
            <p class="lead"><?= htmlspecialchars($slogan) ?></p>
          <?php endif; ?>
          <?php if (!empty($description)): ?>
            <p><?= nl2br(htmlspecialchars($description)) ?></p>
          <?php endif; ?>
        </div>
      </div>

      <div class="row mb-5">
        <div class="col-md-6">
          <h2 class="h5 mb-3">Missão</h2>
          <p><?= nl2br(htmlspecialchars($mission)) ?></p>
        </div>
        <div class="col-md-6">
          <h2 class="h5 mb-3">Visão</h2>
          <p><?= nl2br(htmlspecialchars($vision)) ?></p>
        </div>
      </div>

      <div class="row mb-5">
        <div class="col-md-12">
          <h2 class="h5 mb-3">Contato</h2>
          <p>
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

      <div class="row mb-5">
        <div class="col-md-12">
          <h2 class="h5 mb-3">Nossa Equipe</h2>
        </div>
        <div class="col-md-4 text-center">
          <img src="/assets/images/team/joao-umbala.jpg" alt="Fundador" class="about-img mb-2" style="max-width:180px;">
          <h6 class="mb-0">João Umbala</h6>
          <small class="text-muted">Fundador & Mestre Padeiro</small>
        </div>
        <div class="col-md-4 text-center">
          <img src="/assets/images/team/maria-silva.jpg" alt="Equipe" class="about-img mb-2" style="max-width:180px;">
          <h6 class="mb-0">Maria Silva</h6>
          <small class="text-muted">Confeiteira</small>
        </div>
        <div class="col-md-4 text-center">
          <img src="/assets/images/team/carlos-sousa.jpg" alt="Equipe" class="about-img mb-2" style="max-width:180px;">
          <h6 class="mb-0">Carlos Souza</h6>
          <small class="text-muted">Atendimento</small>
        </div>
      </div>

      <?php endif; ?>

    </main>
