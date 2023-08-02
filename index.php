<?php ?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ordem de Seviço</title>
  <?php include_once 'utils/dependencias.php'; ?>
</head>

<body>
  <?php include_once 'views/menu-logged-out.php'; ?>

  <section class="hero">
    <div class="container mt-5">
      <h1 class="text-center">Seja bem vindo ao sistema de Ordem de Serviço</h1>
    </div>
  </section>

  <section class="conteudo">
    <div class="container mt-5">
      <p class="text-center">
        Para iniciar, basta clicar em <a href="login.php">Login</a>.<br>
        Ainda não tem uma conta? Clique em <a href="cadastro.php">Cadastro</a>
      </p>
    </div>
  </section>

  <?php include_once 'utils/inject_js.php'; ?>
</body>

</html>