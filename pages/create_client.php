<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja de Eletrônicos - Cadastro de Cliente</title>
  <?php include_once '../utils/dependencias.php'; ?>
</head>

<body>
  <div class="container">
    <h2 class="mt-4">Cadastro de Cliente</h2>
    <form action="save_client.php" method="post">
      <div class="form-group">
        <label for="name">Nome Completo <span class="text-danger">*</span></label>
        <input type="text" name="name" id="name" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="rg">RG</label>
        <input type="text" name="rg" id="rg" class="form-control">
      </div>
      <div class="form-group">
        <label for="cpf">CPF</label>
        <input type="text" name="cpf" id="cpf" class="form-control">
      </div>
      <div class="form-group">
        <label for="cnpj">CNPJ</label>
        <input type="text" name="cnpj" id="cnpj" class="form-control">
      </div>
      <div class="form-group">
        <label for="address">Endereço</label>
        <input type="text" name="address" id="address" class="form-control">
      </div>
      <div class="form-group">
        <label for="number">Número</label>
        <input type="text" name="number" id="number" class="form-control">
      </div>
      <div class="form-group">
        <label for="complement">Complemento</label>
        <input type="text" name="complement" id="complement" class="form-control">
      </div>
      <div class="form-group">
        <label for="district">Bairro</label>
        <input type="text" name="district" id="district" class="form-control">
      </div>
      <div class="form-group">
        <label for="city">Cidade</label>
        <input type="text" name="city" id="city" class="form-control">
      </div>
      <div class="form-group">
        <label for="state">Estado</label>
        <input type="text" name="state" id="state" class="form-control">
      </div>
      <div class="form-group">
        <label for="phone1">Telefone 1 <span class="text-danger">*</span></label>
        <input type="text" name="phone1" id="phone1" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="phone2">Telefone 2</label>
        <input type="text" name="phone2" id="phone2" class="form-control">
      </div>
      <div class="form-group">
        <label for="phone3">Telefone 3</label>
        <input type="text" name="phone3" id="phone3" class="form-control">
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="email" name="email" id="email" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Cadastrar Cliente</button>
    </form>
  </div>
  <?php include_once '../utils/inject_js.php'; ?>
</body>

</html>