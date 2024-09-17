<?php
    $pagina = "funcionarios";
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
    <!--Stylesheet-->
    <?php echo $css; echo $cssPesquisa; ?>

<section class="container mt-5">

    <div class="container">
        <div class="col-mt-12">
            <label for="funcionarios">Pesquisar por:</label>
            <select name="funcionarios" id="funcionarios" class="btn btn-sm btn-primary" >
                <option value="medicos">Médicos(as)</option>
                <option value="enfermeiros">Enfermeiros(as)</option>
                <option value="secretarios">Secretários(as)</option>
                <option value="administradores">Administradores</option>
            </select>
        </div>
        </br>
        <div class="row height d-flex justify-content-center align-items-center">
            <div class="col-md-12">
            <div class="pesquisa">
            <i class="fa fa-search"></i>
            <div class="d-flex flex-row">
                <input type="text" class="form-control" placeholder="Pesquisar Funcionarios">
                <button class="btn btn-primary">Pesquisar</button>
            </div>
            </div>
            </div>
        </div>
    </div>

    </br>

    <div>
        <td class="action-row">
            <a href="../view/cadastroFuncionarios.php" class="btn btn-sm btn-primary">Cadastrar Funcionário(s)</a>
        </tr>
    </div>

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
                    <a href="listagem.php" class="btn btn-sm btn-primary">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </tr>
            </td>
            <tr>
            <th scope="row">123.456.789.11</th>
                <td>Andrea da Silva</td>
                <td>Enfermeira</td>
                <td>e12346</td>
                <td class="action-row">
                    <a href="listagem.php" class="btn btn-sm btn-primary">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </tr>
            </tr>
            <tr>
            <th scope="row">123.456.789.12</th>
                <td>Antônio da Serra</td>
                <td>Médico Cardiologista</td>
                <td>m12347</td>
                <td class="action-row">
                    <a href="listagem.php" class="btn btn-sm btn-primary">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </tr>
            </tr>
            <tr>
            <th scope="row">123.456.789.13</th>
                <td>Rosa Martins</td>
                <td>Administradora</td>
                <td>A12348</td>
                <td class="action-row">
                    <a href="listagem.php" class="btn btn-sm btn-primary">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </tr>
            </tr>
        </tbody>
    </table>
</section>
<?php
    include "footer.php";
?>