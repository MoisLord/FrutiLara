<?php
// controller ya habrá hecho: $entries = (new BitacoraController)->listar();
if (!isset($entries) || !is_array($entries)) {
    $entries = [];
}
?>
<table>
  <thead>
    <tr>
        <th>ID</th>
        <th>tipo de usuario</th>
        <th>cedula</th>
        <th>clave</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($entries as $e): ?>
      <tr>
        <td><?=htmlspecialchars($e['id_usuarios'])?></td>
        <td><?=htmlspecialchars($e['tipo_usuario'])?></td>
        <td><?=htmlspecialchars($e['cedula'])?></td>
        <td><?=htmlspecialchars($e['clave'])?></td>
      </tr>
      <input type="hidden" name="csrf_token" value="<?= $_SESSION['csrf_token'] ?>">
    <?php endforeach; ?>
  </tbody>
</table>