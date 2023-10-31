<?php
    $pagina = "desativarFuncionarios";
    $footerColado = True;
    include "config.php";
    include "header.php";
?>

    <title> <?php echo $title;?></title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta charset = "UTF-8">
    <link href="<?php echo $url.$logo;?>" rel="icon">
   
 
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;500;600&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <?php echo $css;?>

<section class="container mt-5">



<h1 class="mt-3">
        Funcionários cadastrados
    </h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">CPF</th>
                <th scope="col">Nome</th>
                <th scope="col">Especificação</th>
                <th scope="col">Prontuário</th>
                <th scope="col" class="actions text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">123.456.789.10</th>
                <td>Renata Mussulino</td>
                <td>Médica Pediatra</td>
                <td>M12345</td>
                <td class="action-row">
                    <a type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ModalLongoExemplo"> Desativar </a>
                </tr>
            </td>
            <tr>
            <th scope="row">123.456.789.11</th>
                <td>Andrea da Silva</td>
                <td>Enfermeira</td>
                <td>e12346</td>
                <td class="action-row">
                <a type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ModalLongoExemplo"> Desativar </a>
                </tr>
            </tr>
            <tr>
            <th scope="row">123.456.789.12</th>
                <td>Antônio da Serra</td>
                <td>Médico Cardiologista</td>
                <td>m12347</td>
                <td class="action-row">
                <a type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ModalLongoExemplo"> Desativar </a>
                </tr>
            </tr>
            <tr>
            <th scope="row">123.456.789.13</th>
                <td>Rosa Martins</td>
                <td>Administradora</td>
                <td>A12348</td>
                <td class="action-row">
                <a type="button" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#ModalLongoExemplo"> Desativar </a>
                </tr>
            </tr>
        </tbody>
    </table>

 

<!-- Modal -->
<div class="modal fade" id="ModalLongoExemplo" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalLongoExemplo">Desativar Funcionario</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      Deseja desativar o  funcionario selecionado?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <a type="button" class="btn btn-danger" data-bs-toggle="modal" href="#modal2"> Desativar </a>
      </div>
    </div>
  </div>
</div>
<!-- Modal 2 -->
<div class="modal fade" id="modal2" tabindex="-1" role="dialog" aria-labelledby="TituloModalLongoExemplo" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="TituloModalLongoExemplo">Desativar Fuincionario</h5>
        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Fechar">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <p> Para continuar digite sua senha <p>
            <label for="password">Senha</label>
            <input type="password" placeholder="Senha" id="password">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-danger">Confirmar</button>
      </div>
    </div>
  </div>
</div>

            
        </tbody>
    </table>
</section>
<?php
    include "footer.php";
?>