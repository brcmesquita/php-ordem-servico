<!DOCTYPE html>
<html>

<head>
  <title>Loja de Eletrônicos - Cadastro</title>
  <?php include_once 'utils/dependencias.php'; ?>
</head>

<body>

  <?php include_once 'views/menu-logged-out.php'; ?>

  <section>
    <div class="container">
      <h1 class="text-center mt-5">Cadastro de Novo Usuário</h1>
      <div class="row justify-content-center mt-5">
        <div class="col-md-4">
          <form method="post" action="pages/register_user.php">
            <div class="form-group">
              <label for="name">Nome</label>
              <input type="text" class="form-control" id="name" name="name" placeholder="Digite seu nome completo"
                required>
            </div>
            <div class="form-group">
              <label for="email">Email</label>
              <input type="email" class="form-control" id="email" name="email" placeholder="Digite o seu melhor e-mail"
                required>
            </div>
            <div class="form-group">
              <label for="password">Senha</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Digite uma senha"
                required>
            </div>
            <div class="form-group">
              <label for="confirm_password">Confirmar Senha</label>
              <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                placeholder="Confirme essa senha" required>
            </div>
            <div class="form-group mt-3">
              <button type="submit" class="btn btn-primary">Cadastrar</button>
              <a href="login.php" class="btn btn-danger">Voltar</a>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>


  <?php include_once 'utils/inject_js.php'; ?>
</body>

</html>