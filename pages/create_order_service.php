<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Loja de Eletrônicos - Cadastro de Ordem de Serviço</title>
  <?php include_once '../utils/dependencias.php'; ?>
</head>

<body>
  <div class="container">
    <h2 class="mt-4">Cadastro de Ordem de Serviço</h2>
    <form action="save_order_service.php" method="post">
      <div class="form-group">
        <label for="entry_date">Data de Entrada <span class="text-danger">*</span></label>
        <input type="date" name="entry_date" id="entry_date" class="form-control" required>
      </div>
      <div class="form-group">
        <label for="entry_reason">Motivo de Entrada <span class="text-danger">*</span></label>
        <select name="entry_reason" id="entry_reason" class="form-control" required>
          <option value="">Selecione um motivo</option>
          <!-- Aqui você deve carregar os motivos de entrada cadastrados no banco de dados -->
        </select>
      </div>
      <div class="form-group">
        <label for="client">Cliente <span class="text-danger">*</span></label>
        <select name="client" id="client" class="form-control" required>
          <option value="">Selecione um cliente</option>
          <!-- Aqui você deve carregar os clientes cadastrados no banco de dados -->
        </select>
      </div>

      <div class="form-group">
        <h3>Aparelhos</h3>
        <div class="devices-container">
          <div class="form-row">
            <div class="col-md-3">
              <label for="device">Aparelho</label>
              <select name="device[]" class="form-control" required>
                <option value="">Selecione o aparelho</option>
                <!-- Aqui você deve carregar os aparelhos cadastrados no banco de dados -->
              </select>
            </div>
            <div class="col-md-3">
              <label for="device_type">Tipo do Aparelho</label>
              <select name="device_type[]" class="form-control" required>
                <option value="">Selecione o tipo do aparelho</option>
                <!-- Aqui você deve carregar os tipos de aparelhos cadastrados no banco de dados -->
              </select>
            </div>
            <div class="col-md-3">
              <label for="manufacturer">Fabricante</label>
              <select name="manufacturer[]" class="form-control" required>
                <option value="">Selecione o fabricante</option>
                <!-- Aqui você deve carregar os fabricantes cadastrados no banco de dados -->
              </select>
            </div>
            <div class="col-md-3">
              <label for="model">Modelo</label>
              <input type="text" name="model[]" class="form-control" required>
            </div>
          </div>
        </div>
        <button type="button" class="btn btn-secondary mt-2" id="add-device-btn">Adicionar Aparelho</button>
      </div>


      <button type="submit" class="btn btn-primary">Cadastrar Ordem de Serviço</button>
    </form>
  </div>
  <?php include_once '../utils/inject_js.php'; ?>
  <!-- ... (código anterior) ... -->
  <script>
  document.addEventListener("DOMContentLoaded", function() {
    const addDeviceButton = document.getElementById("add-device-btn");
    const devicesContainer = document.querySelector(".devices-container");

    addDeviceButton.addEventListener("click", function() {
      const deviceRow = document.createElement("div");
      deviceRow.classList.add("form-row", "mt-2");

      const deviceCol = document.createElement("div");
      deviceCol.classList.add("col-md-3");

      const deviceTypeCol = document.createElement("div");
      deviceTypeCol.classList.add("col-md-3");

      const manufacturerCol = document.createElement("div");
      manufacturerCol.classList.add("col-md-3");

      const modelCol = document.createElement("div");
      modelCol.classList.add("col-md-3");

      const deviceSelect = document.createElement("select");
      deviceSelect.setAttribute("name", "device[]");
      deviceSelect.classList.add("form-control");
      deviceSelect.required = true;

      // Aqui você deve adicionar as opções dos aparelhos cadastrados no banco de dados

      const deviceTypeSelect = document.createElement("select");
      deviceTypeSelect.setAttribute("name", "device_type[]");
      deviceTypeSelect.classList.add("form-control");
      deviceTypeSelect.required = true;

      // Aqui você deve adicionar as opções dos tipos de aparelhos cadastrados no banco de dados

      const manufacturerSelect = document.createElement("select");
      manufacturerSelect.setAttribute("name", "manufacturer[]");
      manufacturerSelect.classList.add("form-control");
      manufacturerSelect.required = true;

      // Aqui você deve adicionar as opções dos fabricantes cadastrados no banco de dados

      const modelInput = document.createElement("input");
      modelInput.setAttribute("type", "text");
      modelInput.setAttribute("name", "model[]");
      modelInput.classList.add("form-control");
      modelInput.required = true;

      deviceCol.appendChild(deviceSelect);
      deviceTypeCol.appendChild(deviceTypeSelect);
      manufacturerCol.appendChild(manufacturerSelect);
      modelCol.appendChild(modelInput);

      deviceRow.appendChild(deviceCol);
      deviceRow.appendChild(deviceTypeCol);
      deviceRow.appendChild(manufacturerCol);
      deviceRow.appendChild(modelCol);

      devicesContainer.appendChild(deviceRow);
    });
  });
  </script>
  <!-- ... (código posterior) ... -->

</body>

</html>