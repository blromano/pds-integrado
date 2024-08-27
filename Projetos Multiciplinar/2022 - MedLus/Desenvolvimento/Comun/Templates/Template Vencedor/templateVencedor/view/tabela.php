<?php
    $pagina = "tabela";
    $footerColado = True;
    include "config.php";
    include "header.php";
?>

<section class="container mt-5">
    <h1 class="mt-3">
        Pessoas cadastradas     
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
                    <a href="listagem.php" class="btn btn-sm btn-primary">Detalhes</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </tr>
            </td>
            <tr>
                <th scope="row">2</th>
                <td>Edilson Diniz Silvestre</td>
                <td>edilson07@hotmail.com</td>
                <td>45</td>
                <td class="action-row">
                    <a href="listagem.php" class="btn btn-sm btn-primary">Detalhes</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </tr>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Tarcizo Roberto</td>
                <td>tartar6969@orkut.com</td>
                <td>63</td>
                <td class="action-row">
                    <a href="listagem.php" class="btn btn-sm btn-primary">Detalhes</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </tr>
            </tr>
            <tr>
                <th scope="row">4</th>
                <td>Alberto Silva Rodrigues</td>
                <td>albgames@gmail.com</td>
                <td>94</td>
                <td class="action-row">
                    <a href="listagem.php" class="btn btn-sm btn-primary">Detalhes</a>
                    <a href="#" class="btn btn-sm btn-danger">Excluir</a>
                </tr>
            </tr>
        </tbody>
    </table>
</section>
<?php
    include "footer.php";
?>