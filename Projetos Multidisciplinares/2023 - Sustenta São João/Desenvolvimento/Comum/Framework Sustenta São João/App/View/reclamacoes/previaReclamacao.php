<head>
  <link rel="stylesheet" type="text/css" href="style_MOD02.css" media="screen" />
</head>
<div class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="card">
        <div class="card-header">
          <h5 class="title">
            <?php echo $this->getView()->title; ?>
          </h5>
        </div>
        <div class="card-body">
          <form>
            <table class="table-striped" style="width:100%;">
              <thead>
                <tr>
                  <th style="text-align: justify;" class="th-drop">Titúlo da reclamação</th>
                  <!-- <th class="th-drop">Departamento</th> -->
                  <th style="text-align: center;" class="th-drop">Data de abertura</th>
                  <th style="text-align: center;" class="th-drop">Situação</th>
                  <th style="text-align: center;" class="th-drop">Ações</th>
                </tr>
              </thead>
              <?php foreach ($this->getView()->reclamacao as $dado) { ?>
                <tr>
                  <td style="text-align: justify;">
                    <?php echo $dado->__get('REC_TITULO_RECLAMACAO'); ?>
                  </td>
                  <!-- <td>Departamento 1</td> -->
                  <td style="text-align: center;">
                    <?php echo $dado->__get('REC_DATAHORA'); ?>
                    </tdstyle=>
                  <td style="text-align: center; font-weight: bold;">
                    <?php
                    $temp = $dado->__get('REC_STATUS');
                    if ($temp == 'P') {
                      // echo('Teste');
                      // echo "<i class='btn-pendente fa-solid fa-x'></i>";
                      echo '<font color= "red">Pendente';
                    } else if ($temp == 'A') {
                      // echo "<i class='btn-andamento fa-solid fa-circle-exclamation'></i>";
                      echo '<font color= "#FFBE55">Em Andamento';
                    } else {
                      // echo "<i class='btn-resolvido fa-solid fa-check'></i>";
                      echo '<font color= "#1BEB11">Resolvido';
                    }
                    ?>
                  </td>

                  <td style="text-align: center;" class="btn-mod02">
                    <!-- <a style="color: white text-decoration: none" href="/dashboard/adminReclamacao?">Visualizar</a> -->

                    <!-- <a style="color: white text-decoration: none" href="/dashboard/adminReclamacao?id=" -->
                    <a class="btn btn-success btn-color btn-size" style="color: white; text-decoration: none"
                      href="/dashboard/respReclamacao?id=<?php echo $dado->__get("REC_ID"); ?>">Responder</a>
                    <a class="btn btn-warning btn-size" style="color: white; text-decoration: none"
                      href="/dashboard/adminReclamacao?id=<?php echo $dado->__get("REC_ID"); ?>">Visualizar</a>
                  </td>
                <?php } ?>
              </tr>
              </tbody>
            </table>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>