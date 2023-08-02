<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja de Eletrônicos - Cadastro de Status dos Itens</title>
  <?php include_once '../utils/dependencias.php'; ?>
</head>

<body>
  <div class="container">
    <h2 class="mt-4">Cadastro de Status dos Itens</h2>
    <form action="save_item_status.php" method="post">
      <div class="form-group">
        <label for="status">Status do Item <span class="text-danger">*</span></label>
        <input type="text" name="status" id="status" class="form-control" required>
      </div>
      <button type="submit" class="btn btn-primary">Cadastrar Status do Item</button>
    </form>
  </div>
  <?php include_once '../utils/inject_js.php'; ?>
</body>

</html>