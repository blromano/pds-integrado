<?php
    $pagina = "dependentes";
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

    <div>
        <td class="action-row">
            <a class="btn btn-sm btn-primary" href="cadastroDependente.php">Cadastrar Dependente(s)</a>
        </tr>
        <td>
        <a class="btn btn-sm btn-danger" href="desativarDependentes.php">Desativar Dependente(s)</a>
    </td>
    </div>

    <h1 class="mt-3">
        Dependentes cadastradas
    </h1>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nome</th>
                <th scope="col">Email</th>
                <th scope="col">Idade</th>
                <th scope="col" class="actions text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Renata Mussulino</td>
                <td>ingrata@gmail.com</td>
                <td>54</td>
                <td class="action-row">
                    <a href="listagem.php" class="btn btn-sm btn-primary">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </tr>
            </td>
            <tr>
                <th scope="row">2</th>
                <td>Edilson Diniz Silvestre</td>
                <td>edilson07@hotmail.com</td>
                <td>15</td>
                <td class="action-row">
                    <a href="listagem.php" class="btn btn-sm btn-primary">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </tr>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Tarcizo Roberto</td>
                <td>tartar6969@orkut.com</td>
                <td>63</td>
                <td class="action-row">
                    <a href="listagem.php" class="btn btn-sm btn-primary">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </tr>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Alberto Silva Rodrigues</td>
                <td>albgames@gmail.com</td>
                <td>94</td>
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