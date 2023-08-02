<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja de Eletrônicos - Cadastro de Motivo de Entrada</title>
  <?php include_once '../utils/dependencias.php'; ?>
</head>

<body>
  <div class="container">
    <h2 class="mt-4">Cadastro de Motivo de Entrada</h2>
    <form action="save_entry_reason.php" method="post">
      <div class="form-group">
        <label for="reason">Motivo de Entrada <span class="text-danger">*</span></label>
        <input type="text" name="reason" id="reason" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Cadastrar Motivo de Entrada</button>
    </form>
  </div>
  <?php include_once '../utils/inject_js.php'; ?>
</body>

</html>