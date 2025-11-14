<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="page-head">
  <i data-lucide="file-edit"></i>
  <div>
    <div class="page-title">Editar Relatório de Paciente</div>
    <div class="page-sub">Atualize as informações do relatório de avaliação nutricional</div>
  </div>
</div>

<?php if (!empty($error)): ?>
  <div style="padding: 12px; background: rgba(220, 38, 38, 0.1); border: 1px solid #dc2626; border-radius: 8px; margin-bottom: 16px; color: #dc2626;">
    <?= htmlspecialchars($error) ?>
  </div>
<?php endif; ?>

<form method="post" action="?action=reports_edit&id=<?= (int)$report->id ?>" style="max-width: 900px;">
  
  <!-- Informações Básicas do Paciente -->
  <div style="background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 20px; margin-bottom: 16px;">
    <h3 style="margin: 0 0 16px 0; font-size: 18px; color: var(--primary); display: flex; align-items: center; gap: 8px;">
      <i data-lucide="user"></i> Informações do Paciente
    </h3>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 16px;">
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Nome do Paciente *</label>
        <input type="text" name="patient_name" required value="<?= htmlspecialchars($report->patientName) ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Idade</label>
        <input type="number" name="patient_age" min="0" max="150" value="<?= $report->patientAge ? (int)$report->patientAge : '' ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Gênero</label>
        <select name="patient_gender" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
          <option value="">Selecione...</option>
          <option value="Masculino" <?= $report->patientGender === 'Masculino' ? 'selected' : '' ?>>Masculino</option>
          <option value="Feminino" <?= $report->patientGender === 'Feminino' ? 'selected' : '' ?>>Feminino</option>
          <option value="Outro" <?= $report->patientGender === 'Outro' ? 'selected' : '' ?>>Outro</option>
        </select>
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Data da Consulta *</label>
        <input type="date" name="appointment_date" required value="<?= htmlspecialchars($report->appointmentDate) ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
    </div>
  </div>

  <!-- Medidas Antropométricas -->
  <div style="background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 20px; margin-bottom: 16px;">
    <h3 style="margin: 0 0 16px 0; font-size: 18px; color: var(--primary); display: flex; align-items: center; gap: 8px;">
      <i data-lucide="ruler"></i> Medidas Antropométricas
    </h3>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Peso (kg)</label>
        <input type="number" name="weight" step="0.1" min="0" value="<?= $report->weight ? number_format($report->weight, 1, '.', '') : '' ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Altura (m)</label>
        <input type="number" name="height" step="0.01" min="0" max="3" value="<?= $report->height ? number_format($report->height, 2, '.', '') : '' ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">IMC</label>
        <input type="number" name="bmi" step="0.1" min="0" value="<?= $report->bmi ? number_format($report->bmi, 1, '.', '') : '' ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">% Gordura Corporal</label>
        <input type="number" name="body_fat_percentage" step="0.1" min="0" max="100" value="<?= $report->bodyFatPercentage ? number_format($report->bodyFatPercentage, 1, '.', '') : '' ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Massa Muscular (kg)</label>
        <input type="number" name="muscle_mass" step="0.1" min="0" value="<?= $report->muscleMass ? number_format($report->muscleMass, 1, '.', '') : '' ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
    </div>
  </div>

  <!-- Exames Laboratoriais -->
  <div style="background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 20px; margin-bottom: 16px;">
    <h3 style="margin: 0 0 16px 0; font-size: 18px; color: var(--primary); display: flex; align-items: center; gap: 8px;">
      <i data-lucide="flask-conical"></i> Exames Laboratoriais
    </h3>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Pressão Arterial</label>
        <input type="text" name="blood_pressure" placeholder="Ex: 120/80" value="<?= htmlspecialchars($report->bloodPressure ?? '') ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Glicemia (mg/dL)</label>
        <input type="number" name="blood_glucose" step="0.1" min="0" value="<?= $report->bloodGlucose ? number_format($report->bloodGlucose, 1, '.', '') : '' ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Colesterol Total (mg/dL)</label>
        <input type="number" name="cholesterol_total" step="0.1" min="0" value="<?= $report->cholesterolTotal ? number_format($report->cholesterolTotal, 1, '.', '') : '' ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">LDL (mg/dL)</label>
        <input type="number" name="cholesterol_ldl" step="0.1" min="0" value="<?= $report->cholesterolLdl ? number_format($report->cholesterolLdl, 1, '.', '') : '' ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">HDL (mg/dL)</label>
        <input type="number" name="cholesterol_hdl" step="0.1" min="0" value="<?= $report->cholesterolHdl ? number_format($report->cholesterolHdl, 1, '.', '') : '' ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Triglicerídeos (mg/dL)</label>
        <input type="number" name="triglycerides" step="0.1" min="0" value="<?= $report->triglycerides ? number_format($report->triglycerides, 1, '.', '') : '' ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
    </div>
  </div>

  <!-- Avaliação Nutricional -->
  <div style="background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 20px; margin-bottom: 16px;">
    <h3 style="margin: 0 0 16px 0; font-size: 18px; color: var(--primary); display: flex; align-items: center; gap: 8px;">
      <i data-lucide="clipboard-list"></i> Avaliação Nutricional
    </h3>
    <div style="display: grid; gap: 16px;">
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Queixas do Paciente</label>
        <textarea name="complaints" rows="4" placeholder="Descreva as principais queixas e sintomas relatados pelo paciente..." 
                  style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface); font-family: inherit; resize: vertical;"><?= htmlspecialchars($report->complaints ?? '') ?></textarea>
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Avaliação Dietética</label>
        <textarea name="dietary_assessment" rows="4" placeholder="Avalie os hábitos alimentares do paciente..." 
                  style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface); font-family: inherit; resize: vertical;"><?= htmlspecialchars($report->dietaryAssessment ?? '') ?></textarea>
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Atividade Física</label>
        <textarea name="physical_activity" rows="3" placeholder="Descreva o nível e tipo de atividade física do paciente..." 
                  style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface); font-family: inherit; resize: vertical;"><?= htmlspecialchars($report->physicalActivity ?? '') ?></textarea>
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Diagnóstico Nutricional</label>
        <textarea name="nutritional_diagnosis" rows="4" placeholder="Registre o diagnóstico nutricional baseado na avaliação..." 
                  style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface); font-family: inherit; resize: vertical;"><?= htmlspecialchars($report->nutritionalDiagnosis ?? '') ?></textarea>
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Plano Alimentar</label>
        <textarea name="dietary_plan" rows="5" placeholder="Descreva o plano alimentar prescrito..." 
                  style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface); font-family: inherit; resize: vertical;"><?= htmlspecialchars($report->dietaryPlan ?? '') ?></textarea>
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Recomendações</label>
        <textarea name="recommendations" rows="4" placeholder="Registre as recomendações gerais para o paciente..." 
                  style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface); font-family: inherit; resize: vertical;"><?= htmlspecialchars($report->recommendations ?? '') ?></textarea>
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Próxima Consulta</label>
        <input type="date" name="next_appointment" value="<?= htmlspecialchars($report->nextAppointment ?? '') ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Observações Adicionais</label>
        <textarea name="notes" rows="4" placeholder="Anotações adicionais relevantes..." 
                  style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface); font-family: inherit; resize: vertical;"><?= htmlspecialchars($report->notes ?? '') ?></textarea>
      </div>
    </div>
  </div>

  <div style="display: flex; gap: 12px; margin-top: 20px;">
    <button type="submit" class="btn btn-primary">
      <i data-lucide="save"></i> Salvar Alterações
    </button>
    <a href="/nutrihealth/public/?action=reports" class="btn">
      <i data-lucide="x"></i> Cancelar
    </a>
  </div>
</form>

<script>
lucide.createIcons();
</script>

<?php include __DIR__ . '/../partials/footer.php'; ?>


