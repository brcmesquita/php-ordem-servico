<!DOCTYPE html>
<html>

<head>
  <title>Loja de Eletrônicos - Login</title>
  <?php include_once 'utils/dependencias.php'; ?>
</head>

<body>
  <?php include_once 'views/menu.php'; ?>
  <div class="container">
    <h1 class="text-center mt-5">Loja de Eletrônicos</h1>
    <div class="row justify-content-center mt-5">
      <div class="col-md-4">
        <form method="post" action="pages/authenticate.php">
          <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
          </div>
          <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" class="form-control" id="password" name="password" required>
          </div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary">Entrar</button>
            <a href="register.php" class="btn btn-secondary">Cadastrar</a>
          </div>
        </form>
      </div>
    </div>
  </div>

  <?php include_once 'utils/inject_js.php'; ?>
</body>

</html>