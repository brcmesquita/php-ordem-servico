<?php include_once 'utils/isConnected.php'; ?>

<!DOCTYPE html>
<html>

<head>
  <title>Loja de Eletrônicos - Tela Inicial</title>
  <?php include_once 'utils/dependencias.php'; ?>
</head>

<body>
  <div class="container">
    <h1 class="text-center mt-5">Loja de Eletrônicos</h1>
    <div class="row justify-content-center mt-5">

      <?php include_once 'views/menu-logged-in.php'; ?>

      <h2 class="mb-3">Ordens de Serviço</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Ordem de Serviço</th>
            <th>Status</th>
            <th>Nome do Cliente</th>
            <th>Nome do Técnico</th>
            <th>Opções</th>
          </tr>
        </thead>
        <tbody>
          <?php
          require_once 'db/DB.php';

          $db = new DB();
          $conn = $db->getConnection();

          $query = "SELECT o.id AS order_id, o.order_number, o.entry_date, r.reason, c.name AS client_name, s.name AS status
            FROM order_service o
            INNER JOIN entry_reason r ON o.entry_reason_id = r.id
            INNER JOIN clients c ON o.client_id = c.id
            LEFT JOIN order_item i ON o.id = i.order_service_id
            LEFT JOIN item_status s ON i.item_status_id = s.id
            GROUP BY o.id
            ORDER BY o.id DESC";

          $stmt = $conn->prepare($query);
          $stmt->execute();
          $orders = $stmt->fetchAll(PDO::FETCH_ASSOC);
          ?>

          <?php if (count($orders) > 0): ?>
            <table class="table">
              <thead>
                <tr>
                  <th>Ordem de Serviço</th>
                  <th>Motivo da Entrada</th>
                  <th>Nome do Cliente</th>
                  <th>Status</th>
                  <th>Opções</th>
                </tr>
              </thead>
              <tbody>
                <?php foreach ($orders as $order): ?>
                  <tr>
                    <td>
                      <?php echo $order['order_number']; ?>
                    </td>
                    <td>
                      <?php echo $order['reason']; ?>
                    </td>
                    <td>
                      <?php echo $order['client_name']; ?>
                    </td>
                    <td>
                      <?php echo $order['status']; ?>
                    </td>
                    <td>
                      <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                        data-target="#orderDetailsModal">Detalhes</button>
                      <a href="edit_order_service.php?id=<?php echo $order['id']; ?>"
                        class="btn btn-primary btn-sm">Editar</a>
                      <a href="delete_order_service.php?id=<?php echo $order['id']; ?>" class="btn btn-danger btn-sm"
                        onclick="return confirm('Deseja realmente excluir esta ordem de serviço?')">Excluir</a>
                      <a href="return_warranty.php?id=<?php echo $order['id']; ?>" class="btn btn-warning btn-sm">Retorno de
                        Garantia</a>
                    </td>
                  </tr>
                <?php endforeach; ?>
              </tbody>
            </table>
          <?php else: ?>
            <p class="text-center">Nenhuma ordem de serviço encontrada.</p>
          <?php endif; ?>
        </tbody>
      </table>
      <!-- Modal para Detalhes da Ordem de Serviço -->
      <div class="modal fade" id="orderDetailsModal" tabindex="-1" role="dialog"
        aria-labelledby="orderDetailsModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="orderDetailsModalLabel">Detalhes da Ordem de Serviço #12345</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <!-- Aqui você deve exibir os detalhes da ordem de serviço, incluindo os aparelhos relacionados -->
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
            </div>
          </div>
        </div>
      </div>

      <script>
        $(document).ready(function () {
          $('.btn-info').click(function () {
            var orderId = $(this).closest('tr').find('td:first-child').text();

            // Aqui você pode fazer uma requisição AJAX para buscar os detalhes da ordem de serviço
            // e preencher o conteúdo da modal com os dados obtidos.

            // Por enquanto, vamos exibir uma mensagem de exemplo.
            var modalBody = '<p>Detalhes da Ordem de Serviço ' + orderId + ' serão exibidos aqui.</p>';
            $('#orderDetailsModal .modal-body').html(modalBody);
            $('#orderDetailsModal').modal('show');
          });
        });
      </script>



      <?php include_once 'utils/inject_js.php'; ?>
</body>

</html>