<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Editar Usuário</title>
<style>
  body{font-family:Arial,Helvetica,sans-serif;margin:24px}
  label{display:block;margin-top:12px}
  input, select{padding:6px;width:320px;max-width:100%}
  button{margin-top:16px;padding:8px 12px}
  .error{color:#b00020}
</style>
</head>
<body>
<h2>Editar Usuário</h2>
<?php if (!empty($error)): ?><p class="error"><?= htmlspecialchars($error) ?></p><?php endif; ?>
<form method="post" action="?action=edit&id=<?= (int)$user->id ?>">
  <label>Nome
    <input type="text" name="name" required value="<?= htmlspecialchars($user->name) ?>">
  </label>
  <label>Email
    <input type="email" name="email" required value="<?= htmlspecialchars($user->email) ?>">
  </label>
  <label>Tipo de Usuário</label>
  <select name="typeUser" required>
    <option value="A" <?= $user->typeUser === 'A' ? 'selected' : '' ?>>Administrador</option>
    <option value="N" <?= $user->typeUser === 'N' ? 'selected' : '' ?>>Nutricionista</option>
    <option value="U" <?= $user->typeUser === 'U' ? 'selected' : '' ?>>Usuário Comum</option>
  </select>
  <button type="submit">Salvar</button>
</form>
<p><a href="?action=index">Voltar</a></p>
</body>
</html>
