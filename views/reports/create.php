<?php include __DIR__ . '/../partials/header.php'; ?>

<div class="page-head">
  <i data-lucide="file-plus"></i>
  <div>
    <div class="page-title">Novo Relatório de Paciente</div>
    <div class="page-sub">Cadastre um novo relatório de avaliação nutricional</div>
  </div>
</div>

<?php if (!empty($error)): ?>
  <div style="padding: 12px; background: rgba(220, 38, 38, 0.1); border: 1px solid #dc2626; border-radius: 8px; margin-bottom: 16px; color: #dc2626;">
    <?= htmlspecialchars($error) ?>
  </div>
<?php endif; ?>

<form method="post" action="?action=reports_create" style="max-width: 900px;">
  
  <!-- Informações Básicas do Paciente -->
  <div style="background: var(--surface); border: 1px solid var(--border); border-radius: 12px; padding: 20px; margin-bottom: 16px;">
    <h3 style="margin: 0 0 16px 0; font-size: 18px; color: var(--primary); display: flex; align-items: center; gap: 8px;">
      <i data-lucide="user"></i> Informações do Paciente
    </h3>
    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 16px;">
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Nome do Paciente *</label>
        <input type="text" name="patient_name" required value="<?= htmlspecialchars(isset($old) && isset($old['patient_name']) ? $old['patient_name'] : '') ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Idade</label>
        <input type="number" name="patient_age" min="0" max="150" value="<?= htmlspecialchars(isset($old) && isset($old['patient_age']) ? $old['patient_age'] : '') ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Gênero</label>
        <select name="patient_gender" style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
          <option value="">Selecione...</option>
          <option value="Masculino" <?= isset($old) && isset($old['patient_gender']) && $old['patient_gender'] === 'Masculino' ? 'selected' : '' ?>>Masculino</option>
          <option value="Feminino" <?= isset($old) && isset($old['patient_gender']) && $old['patient_gender'] === 'Feminino' ? 'selected' : '' ?>>Feminino</option>
          <option value="Outro" <?= isset($old) && isset($old['patient_gender']) && $old['patient_gender'] === 'Outro' ? 'selected' : '' ?>>Outro</option>
        </select>
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Data da Consulta *</label>
        <input type="date" name="appointment_date" required value="<?= htmlspecialchars(isset($old) && isset($old['appointment_date']) ? $old['appointment_date'] : date('Y-m-d')) ?>" 
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
        <input type="number" name="weight" step="0.1" min="0" value="<?= htmlspecialchars(isset($old) && isset($old['weight']) ? $old['weight'] : '') ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Altura (m)</label>
        <input type="number" name="height" step="0.01" min="0" max="3" value="<?= htmlspecialchars(isset($old) && isset($old['height']) ? $old['height'] : '') ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">IMC</label>
        <input type="number" name="bmi" step="0.1" min="0" value="<?= htmlspecialchars(isset($old) && isset($old['bmi']) ? $old['bmi'] : '') ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">% Gordura Corporal</label>
        <input type="number" name="body_fat_percentage" step="0.1" min="0" max="100" value="<?= htmlspecialchars(isset($old) && isset($old['body_fat_percentage']) ? $old['body_fat_percentage'] : '') ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Massa Muscular (kg)</label>
        <input type="number" name="muscle_mass" step="0.1" min="0" value="<?= htmlspecialchars(isset($old) && isset($old['muscle_mass']) ? $old['muscle_mass'] : '') ?>" 
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
        <input type="text" name="blood_pressure" placeholder="Ex: 120/80" value="<?= htmlspecialchars(isset($old) && isset($old['blood_pressure']) ? $old['blood_pressure'] : '') ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Glicemia (mg/dL)</label>
        <input type="number" name="blood_glucose" step="0.1" min="0" value="<?= htmlspecialchars(isset($old) && isset($old['blood_glucose']) ? $old['blood_glucose'] : '') ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Colesterol Total (mg/dL)</label>
        <input type="number" name="cholesterol_total" step="0.1" min="0" value="<?= htmlspecialchars(isset($old) && isset($old['cholesterol_total']) ? $old['cholesterol_total'] : '') ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">LDL (mg/dL)</label>
        <input type="number" name="cholesterol_ldl" step="0.1" min="0" value="<?= htmlspecialchars(isset($old) && isset($old['cholesterol_ldl']) ? $old['cholesterol_ldl'] : '') ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">HDL (mg/dL)</label>
        <input type="number" name="cholesterol_hdl" step="0.1" min="0" value="<?= htmlspecialchars(isset($old) && isset($old['cholesterol_hdl']) ? $old['cholesterol_hdl'] : '') ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Triglicerídeos (mg/dL)</label>
        <input type="number" name="triglycerides" step="0.1" min="0" value="<?= htmlspecialchars(isset($old) && isset($old['triglycerides']) ? $old['triglycerides'] : '') ?>" 
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
                  style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface); font-family: inherit; resize: vertical;"><?= htmlspecialchars(isset($old) && isset($old['complaints']) ? $old['complaints'] : '') ?></textarea>
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Avaliação Dietética</label>
        <textarea name="dietary_assessment" rows="4" placeholder="Avalie os hábitos alimentares do paciente..." 
                  style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface); font-family: inherit; resize: vertical;"><?= htmlspecialchars(isset($old) && isset($old['dietary_assessment']) ? $old['dietary_assessment'] : '') ?></textarea>
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Atividade Física</label>
        <textarea name="physical_activity" rows="3" placeholder="Descreva o nível e tipo de atividade física do paciente..." 
                  style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface); font-family: inherit; resize: vertical;"><?= htmlspecialchars(isset($old) && isset($old['physical_activity']) ? $old['physical_activity'] : '') ?></textarea>
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Diagnóstico Nutricional</label>
        <textarea name="nutritional_diagnosis" rows="4" placeholder="Registre o diagnóstico nutricional baseado na avaliação..." 
                  style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface); font-family: inherit; resize: vertical;"><?= htmlspecialchars(isset($old) && isset($old['nutritional_diagnosis']) ? $old['nutritional_diagnosis'] : '') ?></textarea>
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Plano Alimentar</label>
        <textarea name="dietary_plan" rows="5" placeholder="Descreva o plano alimentar prescrito..." 
                  style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface); font-family: inherit; resize: vertical;"><?= htmlspecialchars(isset($old) && isset($old['dietary_plan']) ? $old['dietary_plan'] : '') ?></textarea>
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Recomendações</label>
        <textarea name="recommendations" rows="4" placeholder="Registre as recomendações gerais para o paciente..." 
                  style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface); font-family: inherit; resize: vertical;"><?= htmlspecialchars(isset($old) && isset($old['recommendations']) ? $old['recommendations'] : '') ?></textarea>
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Próxima Consulta</label>
        <input type="date" name="next_appointment" value="<?= htmlspecialchars(isset($old) && isset($old['next_appointment']) ? $old['next_appointment'] : '') ?>" 
               style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface);">
      </div>
      <div>
        <label style="display: block; margin-bottom: 6px; font-weight: 500; font-size: 14px;">Observações Adicionais</label>
        <textarea name="notes" rows="4" placeholder="Anotações adicionais relevantes..." 
                  style="width: 100%; padding: 10px; border-radius: 8px; border: 1px solid var(--border); background: var(--surface-elev); color: var(--on-surface); font-family: inherit; resize: vertical;"><?= htmlspecialchars(isset($old) && isset($old['notes']) ? $old['notes'] : '') ?></textarea>
      </div>
    </div>
  </div>

  <div style="display: flex; gap: 12px; margin-top: 20px;">
    <button type="submit" class="btn btn-primary">
      <i data-lucide="save"></i> Salvar Relatório
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

