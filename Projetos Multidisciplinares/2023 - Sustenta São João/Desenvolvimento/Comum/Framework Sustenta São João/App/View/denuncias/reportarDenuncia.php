<head>
    <style>
        .btn-enviar {
            background-color: #3eb84d;
            color: white;
        }
    </style>
</head>
<div class="content card">
  <div class="card-header">
    <h5 class="title"><?php echo $this->getView()->title; ?></h5>
  </div>
  <div class="card-body">
    <form action="reportarViolacao" method="post" class="p-3">
      <div class="form-group">
        <label for="VIO_DESCRICAO">Tipo da violação:</label>
        <select id="VIO_DESCRICAO" name="VIO_DESCRICAO" class="form-control" onchange="checkOther(this)">
          <option value="pornografia">Conteúdo pornográfico ou inadequado</option>
          <option value="ofensivo">Comentário ofensivo</option>
          <option value="odio">Disseminação de ódio</option>
          <option value="outros">Outros</option>
        </select>
        <input type="text" id="outrosInput" name="outrosInput" class="form-control" style="display: none;" placeholder="Digite a descrição aqui">
        <input type="hidden" name="DEN_ID" value="<?php echo $_GET['id'] ?>">
      </div>
      <div class="d-flex justify-content-end my-2">
        <input class="btn btn-enviar w-25" id="botaoEnviar" type="submit" value="Enviar">
      </div>
    </form>
  </div>
</div>

<script>
function checkOther(select) {
  var otherInput = document.getElementById('outrosInput');
  if (select.value == 'outros') {
    otherInput.style.display = 'block';
  } else {
    otherInput.style.display = 'none';
  }
}
</script>