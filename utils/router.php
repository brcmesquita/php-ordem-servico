<?php
class Router
{
  private $routes = [];

  public function get($route, $callback)
  {
    $this->routes['GET'][$route] = $callback;
  }

  public function post($route, $callback)
  {
    $this->routes['POST'][$route] = $callback;
  }

  public function run()
  {
    $method = $_SERVER['REQUEST_METHOD'];
    $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

    if (isset($this->routes[$method][$path])) {
      $callback = $this->routes[$method][$path];
      call_user_func($callback);
    } else {
      // Rota não encontrada, exiba uma página de erro ou redirecione para uma rota padrão
      // header('Location: /pagina_de_erro.php');
      echo 'Página não encontrada';
    }
  }
}
?>