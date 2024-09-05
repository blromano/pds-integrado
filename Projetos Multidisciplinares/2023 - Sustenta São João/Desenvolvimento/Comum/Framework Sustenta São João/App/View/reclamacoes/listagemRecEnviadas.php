<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11.1.3/dist/sweetalert2.min.css">

<head>
  <link rel="stylesheet" type="text/css" href="style_MOD02.css" media="screen" />
</head>
<div class="content">
  <div class="row">
    <div class="card">
      <div class="card-header">
        <h5 class="title">
          <?php echo $this->getView()->title; ?>
        </h5>
      </div>
      <div class="card-body">
        <table class="table-striped" style="width:100%">
          <thead>
            <tr>
              <th class="th-drop">Titúlo da reclamação</th>
              <th class="th-drop">Departamento</th>
              <th class="th-drop">Data de abertura</th>
              <th class="th-drop">Situação</th>
              <th class="th-drop">Ações</th>
            </tr>
          </thead>

          <?php foreach ($this->getView()->reclamacao as $dado) { ?>
            <tr>
              <td>
                <?php echo $dado->__get("REC_TITULO_RECLAMACAO"); ?>
              </td>
              <td>
              <?php
                $setor = $dado->__get("FK_SETORES_SET_ID");
                if ($setor == 1) {
                  echo('Gabinete do prefeito');
                } else if ($setor == 2) {
                  echo('Administração da Prefeitura');
                } else if ($setor == 3) {
                  echo('Desenvolvimento Econômico');
                } else if ($setor == 4) {
                  echo('Segurança e Trânsito');
                } else if ($setor == 5) {
                  echo('Assistência Social');
                } else if ($setor == 6) {
                  echo('Comunicação Social');
                } else if ($setor == 7) {
                  echo('Cultura');
                } else if ($setor == 8) {
                  echo('Educação');
                } else if ($setor == 9) {
                  echo('Engenharia');
                } else if ($setor == 10) {
                  echo('Esportes');
                } else if ($setor == 11) {
                  echo('Finanças');
                } else if ($setor == 12) {
                  echo('Procuradoria-Geral do Município');
                } else if ($setor == 13) {
                  echo('Meio Ambiente, Agricultura e Abastecimento');
                } else if ($setor == 14) {
                  echo('Gestão e Planejamento Urbano');
                } else if ($setor == 15) {
                  echo('Recursos Humanos');
                } else if ($setor == 16) {
                  echo('Saúde');
                } else if ($setor == 17) {
                  echo('Secretaria Geral');
                } else if ($setor == 18) {
                  echo('Obras e Serviços Públicos');
                } else if ($setor == 19) {
                  echo('Turismo');
                } else if ($setor == 20) {
                  echo('Habitação');
                } else if ($setor == 21) {
                  echo('Tecnologia da Informação');
                } else if ($setor == 22) {
                  echo('Proteção e Bem-Estar Animal');
                }

                
                ?>
                <?php // echo $dado->__get("FK_SETORES_SET_ID"); ?>
              </td>
              <td>
                <?php echo $dado->__get("REC_DATAHORA"); ?>
              </td>
              <td>
                <?php
                $temp = $dado->__get('REC_STATUS');
                if ($temp == 'P') {
                  // echo('Teste');
                  echo '<font color= "red">Pendente</font>';
                } else if ($temp == 'A') {
                  echo '<font color= "#FFBE55">Em andamento</font>';
                } else if ($temp == 'R') {
                  echo '<font color= "#1BEB11">Resolvido</font>';
                } else {
                  echo '<font color= "#84DCCF">Finalizado</font>';
                }
                ?>
              </td>
              <td>
                <?php if ($temp == "P") { ?>
                  <a href="/dashboard/editarReclamacao?id=<?php echo $dado->__get("REC_ID"); ?>"
                    class="btn btn-info">Editar</a>
                  <a class="btn btn-danger" data-id="<?php echo $dado->__get("REC_ID"); ?>"
                    onclick="abrirPopup(this, <?php echo $dado->__get("REC_ID"); ?>, '<?php echo $dado->__get("REC_TITULO_RECLAMACAO"); ?>')">Excluir</a>
                <?php }
                if ($temp == "R") { ?>
                  <button class="btn btn-success btn-color btn-size"
                    onclick='openPopup<?php echo $dado->__get("REC_ID"); ?>(this, <?php echo $dado->__get("REC_ID"); ?>)'>Avaliar</button>

                <?php } ?>
              </td>
            </tr>
          <?php } ?>
        </table>
      </div>
    </div>
    <td>
      <a href="/dashboard/reclamacao?id=<?php echo $dado->__get("REC_ID"); ?>" class="btn btn-success">Nova
        Reclamação</a>
      <div id="popup1" class="popUp">
        <div class="header_pop">
          <p>Excluir Reclamação</p>
        </div>
        <div class="body_pop">
          <form id="my_form" action="/dashboard/excluirReclamacao" method="POST">
            <div class="row">
              <div class="col-md-3">
                <div class="form-group">
                  <label for="id">ID</label>
                  <input type="number" name="REC_ID" id="idInput" readonly class="form-control text_s">
                </div>
              </div>
              <div class="col-md-9">
                <div class="form-group">
                  <label for="titulo">Título da Reclamação</label>
                  <input type="text" name="REC_TITULO_RECLAMACAO" id="tituloInput" readonly class="form-control text_s">
                </div>
              </div>
            </div>
            <div class="row justify-content-end alinhar">
              <div>
                <button type="button" class="btn btn-danger btn-sm" onclick="fecharPopup()">
                  <i class="bi bi-backspace"></i> Cancelar
                </button>
                <a id="confirmarExclusao" href="#">
                  <button type="button" class="btn btn-success btn-sm">
                    <i class="bi bi-trash"></i> Confirmar
                  </button>
                </a>
              </div>
            </div>
          </form>
        </div>
      </div>
    <td>
  </div>
</div>
<script>
  var confirmarExclusaoButton = document.getElementById('confirmarExclusao');
  var idInput = document.getElementById('idInput');
  var tituloInput = document.getElementById('tituloInput');

  function buscarPorID(id, callback) {
    console.log('Chamando buscarPorID com o ID:', id);

    fetch('../DAO/ReclamacoesDAO.php?id=' + id)
      .then(response => response.json())
      .then(data => {
        console.log('Dados recuperados com sucesso:', data);

        if (data) {
          // Armazene os dados em variáveis JavaScript
          var id = data.REC_ID;
          var titulo = data.REC_TITULO_RECLAMACAO;

          // Chame a função de callback passando os dados
          callback(id, titulo);
        } else {
          console.error('Objeto não encontrado.');
        }
      })
      .catch(error => {
        // Lide com erros de requisição aqui
        console.error('Erro:', error);
      });
  }

  function abrirPopup(element, id, titulo) {
    var popup = document.getElementById('popup1');

    // Use PHP ou HTML para inserir os dados nos campos do pop-up
    document.getElementById('idInput').value = id;
    document.getElementById('tituloInput').value = titulo;

    // Atualize o atributo href do botão "Confirmar" com o ID do objeto
    confirmarExclusaoButton.href = '/dashboard/excluirReclamacao?id=' + id;

    popup.style.display = 'block';

    confirmarExclusaoButton.addEventListener('click', function () {

      event.preventDefault(); // Impede o envio padrão do formulário

      Swal.fire(
        'Excluído!',
        'A reclamação foi excluída com sucesso.',
        'success'
      ).then((result) => {
        if (result.isConfirmed) {
          fetch('/dashboard/excluirReclamacao?id=' + id, {
            method: 'DELETE'
          }).then(response => {
            if (response.status === 200) {
              // Item excluído com sucesso, exiba o segundo Sweet Alert
              window.location.reload();
            } else {
              // Lida com erros, caso haja algum problema na exclusão
              Swal.fire('Erro na exclusão!', '', 'error');
            }
          }).catch(error => {
            console.error('Erro na solicitação:', error);
          });
        }
      });
    })
  }



  function fecharPopup() {
    var popup = document.getElementById('popup1');
    popup.style.display = 'none';
  }

  var recList = <?php echo json_encode($this->getView()->reclamacao); ?>; // Obtenha a lista de reclamações do PHP

  var emptyMessage = document.getElementById('emptyMessage');
  var caption = document.getElementById('caption');
  var tableBody = document.querySelector('.table_j tbody');

  if (recList.length === 0) {
    // Se a lista estiver vazia, mostre a mensagem vazia e oculte a tabela
    emptyMessage.style.display = 'block';
    tableBody.style.display = 'none';
  } else {
    // Se houver objetos na lista, mostre a tabela e oculte a mensagem vazia
    caption.style.display = 'block';
    tableBody.style.display = 'table-row-group';
  }
</script>