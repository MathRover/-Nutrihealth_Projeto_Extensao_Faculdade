<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="UTF-8">
<title>Usuários</title>
<style>
  body{font-family:Arial,Helvetica,sans-serif;margin:24px}
  table{border-collapse:collapse;width:100%}
  th,td{border:1px solid #ccc;padding:8px;text-align:left}
  th{background:#f2f2f2}
  a.button{display:inline-block;padding:8px 12px;border:1px solid #333;text-decoration:none}
</style>
</head>
<body>
<h2>Lista de Usuários</h2>
<p><a class="button" href="?action=create">Novo Usuário</a></p>
<table>
  <tr><th>ID</th><th>Nome</th><th>Email</th><th>Tipo</th><th>Ações</th></tr>
  <?php foreach ($users as $u): ?>
    <tr>
      <td><?= htmlspecialchars((string)$u->id) ?></td>
      <td><?= htmlspecialchars($u->name) ?></td>
      <td><?= htmlspecialchars($u->email) ?></td>
      <td>
        <?php
          echo $u->typeUser === 'A' ? 'Administrador' :
               ($u->typeUser === 'N' ? 'Nutricionista' : 'Usuário');
        ?>
      </td>
      <td>
        <a href="?action=edit&id=<?= (int)$u->id ?>">Editar</a> |
        <a href="?action=delete&id=<?= (int)$u->id ?>" onclick="return confirm('Excluir usuário?')">Excluir</a>
      </td>
    </tr>
  <?php endforeach; ?>
</table>
</body>
</html>
