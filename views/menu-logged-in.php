<nav class="navbar navbar-expand-lg navbar-light bg-light mb-3">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="#">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/create_order_service.php">Nova Ordem de Serviço</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Retorno Garantia</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Cadastros</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/create_client.php">Cadastro de Cliente</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/create_device.php">Cadastro de Aparelho</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/create_manufacturer.php">Cadastro de Fabricante</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/create_entry_reason.php">Cadastro de Motivo de Entrada</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="pages/create_item_status.php">Cadastro de Status dos Itens</a>
    </li>

  </ul>
  <span class="navbar-text">
    Bem-vindo,
    <?php echo $_SESSION['user_name']; ?> | <a href="pages/logout.php">Sair</a>
  </span>
</nav>


<nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd;">
  <div class="container">
    <?php if ($nome): ?>
      <a class="navbar-brand" href="/index.php">Sistema Web Pessoal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/tarefas/view">Tarefas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/financeiro">Financeiro</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/os">Ordens de Serviço</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/contatos">Contatos</a>
          </li>
        </ul>
        <div class="d-flex gap-1">
          <a class="btn btn-warning" href="/view/editar_usuario.php">Perfil</a>
          <a class="btn btn-danger" href="/view/logout.php">Sair</a>
        </div>
      </div>
    <?php else: ?>
      <a class="navbar-brand" href="/index.php">Sistema Web Pessoal</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll"
        aria-controls="navbarScroll" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarScroll">
        <ul class="navbar-nav me-auto my-2 my-lg-0 navbar-nav-scroll" style="--bs-scroll-height: 100px;">
        </ul>
        <div class="d-flex gap-1">
          <a class="btn btn-primary" href="/view/login.php">Login</a>
          <a class="btn btn-success" href="/view/cadastro.php">Cadastro</a>
        </div>
      </div>
    <?php endif ?>

  </div>
</nav>