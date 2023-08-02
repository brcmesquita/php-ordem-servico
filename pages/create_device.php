<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja de Eletrônicos - Cadastro de Aparelho</title>
  <?php include_once 'menu.php'; ?>
</head>

<body>
  <div class="container">
    <h2 class="mt-4">Cadastro de Aparelho</h2>
    <form action="save_device.php" method="post">
      <div class="form-group">
        <label for="name">Nome do Aparelho <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>
      <!-- Adicione os demais campos do formulário de cadastro de aparelho aqui -->
      <button type="submit" class="btn btn-primary">Cadastrar Aparelho</button>
    </form>
  </div>
  <?php include_once '../utils/inject_js.php'; ?>
</body>

</html>