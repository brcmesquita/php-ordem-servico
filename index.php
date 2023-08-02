<?php
require_once 'utils/router.php';

// Defina suas rotas aqui
$router = new Router();

$router->get('/', function () {
  // Lógica para exibir a página inicial (home.php)
  include_once 'pages/home.php';
});

$router->get('/login', function () {
  // Lógica para exibir a página de login (login.php)
  include_once 'pages/login.php';
});

$router->post('/login', function () {
  // Lógica para processar o formulário de login e autenticar o usuário
  include_once 'actions/login_action.php';
});

// Outras rotas...

// Executa o roteador para processar a rota atual
$router->run();
?>