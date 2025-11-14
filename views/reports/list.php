<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="page-head">
  <i data-lucide="file-text"></i>
  <div>
    <div class="page-title">Relatórios de Pacientes</div>
    <div class="page-sub">Gestão de relatórios e avaliações nutricionais</div>
  </div>
</div>

<div style="margin-bottom: 16px;">
  <a href="/nutrihealth/public/?action=reports_create" class="btn btn-primary">
    <i data-lucide="plus"></i> Novo Relatório
  </a>
</div>

<?php if (empty($reports)): ?>
  <div style="padding: 40px; text-align: center; background: var(--surface); border: 1px solid var(--border); border-radius: 12px;">
    <i data-lucide="file-x" style="width: 48px; height: 48px; margin-bottom: 16px; opacity: 0.5;"></i>
    <p style="color: var(--muted); margin: 0;">Nenhum relatório cadastrado ainda.</p>
  </div>
<?php else: ?>
  <div style="display: grid; gap: 16px;">
    <?php foreach ($reports as $report): ?>
      <div style="background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 20px; transition: all 0.2s;">
        <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 12px;">
          <div>
            <h3 style="margin: 0 0 4px 0; font-size: 18px; font-weight: 600;">
              <?= htmlspecialchars($report->patientName) ?>
              <?php if ($report->patientAge): ?>
                <span style="color: var(--muted); font-weight: normal; font-size: 14px;">
                  (<?= (int)$report->patientAge ?> anos)
                </span>
              <?php endif; ?>
            </h3>
            <div style="display: flex; gap: 16px; flex-wrap: wrap; margin-top: 8px; font-size: 14px; color: var(--muted);">
              <span><i data-lucide="calendar"></i> <?= date('d/m/Y', strtotime($report->appointmentDate)) ?></span>
              <?php if ($report->patientGender): ?>
                <span><i data-lucide="user"></i> <?= htmlspecialchars($report->patientGender) ?></span>
              <?php endif; ?>
              <?php if ($report->weight && $report->height): ?>
                <span><i data-lucide="scale"></i> <?= number_format($report->weight, 1) ?> kg</span>
                <span><i data-lucide="ruler"></i> <?= number_format($report->height, 2) ?> m</span>
                <?php if ($report->bmi): ?>
                  <span><i data-lucide="activity"></i> IMC: <?= number_format($report->bmi, 1) ?></span>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
          <div style="display: flex; gap: 8px;">
            <a href="/nutrihealth/public/?action=reports_edit&id=<?= (int)$report->id ?>" class="btn btn-primary">
              <i data-lucide="edit-3"></i> Editar
            </a>
            <button type="button" class="btn btn-danger" onclick="confirmDelete(<?= (int)$report->id ?>)">
              <i data-lucide="trash-2"></i> Excluir
            </button>
          </div>
        </div>
        
        <?php if ($report->nutritionalDiagnosis || $report->recommendations): ?>
          <div style="margin-top: 12px; padding-top: 12px; border-top: 1px solid var(--border);">
            <?php if ($report->nutritionalDiagnosis): ?>
              <div style="margin-bottom: 8px;">
                <strong style="color: var(--primary); font-size: 13px;">Diagnóstico Nutricional:</strong>
                <p style="margin: 4px 0 0 0; font-size: 14px; color: var(--fg);">
                  <?= nl2br(htmlspecialchars(substr($report->nutritionalDiagnosis, 0, 150))) ?>
                  <?= strlen($report->nutritionalDiagnosis) > 150 ? '...' : '' ?>
                </p>
              </div>
            <?php endif; ?>
            <?php if ($report->recommendations): ?>
              <div>
                <strong style="color: var(--primary); font-size: 13px;">Recomendações:</strong>
                <p style="margin: 4px 0 0 0; font-size: 14px; color: var(--fg);">
                  <?= nl2br(htmlspecialchars(substr($report->recommendations, 0, 150))) ?>
                  <?= strlen($report->recommendations) > 150 ? '...' : '' ?>
                </p>
              </div>
            <?php endif; ?>
          </div>
        <?php endif; ?>
      </div>
    <?php endforeach; ?>
  </div>
<?php endif; ?>

<script>
function confirmDelete(id) {
  Swal.fire({
    title: 'Tem certeza?',
    text: 'Esta ação não poderá ser desfeita!',
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#d33',
    cancelButtonColor: '#3085d6',
    confirmButtonText: 'Sim, excluir!',
    cancelButtonText: 'Cancelar'
  }).then((result) => {
    if (result.isConfirmed) {
      window.location.href = `?action=reports_delete&id=${id}`;
    }
  });
}
lucide.createIcons();
</script>

<?php include __DIR__ . '/../partials/footer.php'; ?>


