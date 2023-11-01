<?php
$dados = [["nome" => "Zé", "situacao" => "Ativo", "plano" => "Trapista", "status" => "Em aberto", "vencimento" => "10/10", "valor" => "XX,XX", "atraso" => "-"], 
          ["nome" => "João", "situacao" => "Ativo", "plano" => "Weiss", "status" => "Atrasada", "vencimento" => "6/10", "valor" => "XX,XX", "atraso" => "2"], 
          ["nome" => "Maria", "situacao" => "Ativo", "plano" => "Weiss", "status" => "Paga", "vencimento" => "10/10", "valor" => "XX,XX", "atraso" => "-"], 
          ["nome" => "Joaquim", "situacao" => "Ativo", "plano" => "Ipa", "status" => "Paga", "vencimento" => "10/10", "valor" => "XX,XX", "atraso" => "-"], 
          ["nome" => "Arthur", "situacao" => "Ativo", "plano" => "Weiss", "status" => "Paga", "vencimento" => "08/10", "valor" => "XX,XX", "atraso" => "-"], 
          ["nome" => "Flávio", "situacao" => "Ativo", "plano" => "Trapista", "status" => "Atrasada", "vencimento" => "07/10", "valor" => "XX,XX", "atraso" => "1"], 
          ["nome" => "Luísa", "situacao" => "Ativo", "plano" => "Ipa", "status" => "Em Aberto", "vencimento" => "15/10", "valor" => "XX,XX", "atraso" => "-"]];
?>
<!DOCTYPE html>
<!--
    Sthéfany bv1720066
-->
<html>
    <head>
        <title>Brewing Space</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <link href="css/css.css" rel="stylesheet" type="text/css"/>
    </head>
    <body>
        <script>
            function setaDadosModal(idUsuario,nome,situacao,plano,status,vencimento,valor,atraso) {
                document.getElementById('id').innerHTML = idUsuario;
                document.getElementById('nome').innerHTML = nome;
                document.getElementById('situacao').innerHTML = situacao;
                document.getElementById('plano').innerHTML = plano;
                document.getElementById('status').innerHTML = status;
                document.getElementById('vencimento').innerHTML = vencimento;
                document.getElementById('valor').innerHTML = valor;
                document.getElementById('atraso').innerHTML = atraso;
            }
        </script>
        <header>
            <nav class="navbar navbar-expand-md navbar-dark bg-dark">
                <div class="container-fluid">

                    <a href="#" class="navbar-brand">
                        <img class="logo" src="img/Logo-2-Transparente.png" alt="logotipo">
                    </a>

                    <button class="navbar-toggler" data-toggle="collapse" data-target="#nav-principal">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="nav-principal">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a href="#" class="nav-link">Feed de notícias</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link ml-3">Receitas</a>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link ml-3 active">Gerenciamento</a>
                            </li>
                            <li class="nav-item">
                                <a href="ferramentasApoio.php" class="nav-link ml-3 ">Ferramentas de apoio</a>
                            </li>
                            <li class="nav-item">
                                <a href="relatorio.php" class="nav-link ml-3 ">Relatorio</a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            
                            <li class="nav-item">
                                <a href="#" class="btn text-light fas fa-sign-out-alt fa-2x"></a>
                            </li>
                        </ul>
                    </div>

                </div>               
            </nav>            
        </header>

        <section>
                        
            <div class="container mt-5">
                <div class="row">
                    <div class="col">
                        <h2 class="h2 pb-2 border-bottom">Gerenciamento de Mensalidades</h2>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <table class="table table-hover text-center table-borderless">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Usuário</th>
                                    <th scope="col">Mês de referência</th>
                                    <th scope="col">Situação</th>
                                    <th scope="col">Plano</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Vencimento</th>
                                    <th scope="col">Valor (R$)</th>
                                    <th scope="col">Dias de atraso</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($dados as $key => $value) { ?>                
                                    <tr data-toggle="collapse" href="#collapseExample<?php echo $key; ?>" role="button" aria-expanded="false" aria-controls="collapseExample<?php echo $key; ?>">
                                        <td scope="row"><?php echo $key; ?></td>
                                        <td><?php echo $value['nome']; ?></td>
                                        <td>Outubro - 10</td>
                                        <td><?php echo $value['situacao']; ?></td>
                                        <td><?php echo $value['plano']; ?></td>
                                        <td><?php echo $value['status']; ?></td>
                                        <td><?php echo $value['vencimento']; ?></td>
                                        <td><?php echo $value['valor']; ?></td>
                                        <td><?php echo $value['atraso']; ?></td>
                                    </tr>
                                    <tr class="collapse border-bottom" id="collapseExample<?php echo $key; ?>">
                                        <td colspan="5">
                                            <a class="btn btn-outline-dark btn-block" href="#" role="button">Notificar atraso</a>
                                        </td>
                                        <td colspan="4">
                                            <a class="btn btn-outline-dark btn-block" type="button" role="button" data-toggle="modal" data-target="#modal" onClick="setaDadosModal('<?php echo $key; ?>','<?php echo $value['nome']; ?>','<?php echo $value['situacao']; ?>','<?php echo $value['plano']; ?>','<?php echo $value['status']; ?>','<?php echo $value['vencimento']; ?>','<?php echo $value['valor']; ?>','<?php echo $value['atraso']; ?>')">Editar</a>
                                        </td>
                                        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="TituloModalCentralizado" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h3>
                                                            <span id='nome' name="nome"></span>&nbsp;-&nbsp;<span id='id' name="id"></span>
                                                        </h3>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body" >
                                                        <form>
                                                                <div class="form-group row">
                                                                    <label for="inputEmail3" class="col-sm-2 col-form-label">Mês de referência</label>
                                                                    <div class="col-sm-10">
                                                                        <input type="text" class="form-control" id="mes" placeholder="Outubro - 10" disabled>
                                                                    </div>
                                                                </div>
                                                                <fieldset class="form-group">
                                                                    <div class="row">
                                                                        <legend class="col-form-label col-sm-2 pt-0">Situação</legend>
                                                                        <div class="col-sm-10">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="situacaoRB" id="ativoRB" value="Ativo" checked>
                                                                                <label class="form-check-label" for="ativoRB">
                                                                                    Usuário ativo
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="situacaoRB" id="inativoRB" value="Inativo">
                                                                                <label class="form-check-label" for="inativoRB">
                                                                                    Usuário inativo
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <fieldset class="form-group">
                                                                    <div class="row">
                                                                        <legend class="col-form-label col-sm-2 pt-0">Plano</legend>
                                                                        <div class="col-sm-10">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="planoRB" id="freeRB" value="Free">
                                                                                <label class="form-check-label" for="freeRB">
                                                                                    Free
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="planoRB" id="weissTrialRB" value="Weiss/Trial">
                                                                                <label class="form-check-label" for="weissTrialRB">
                                                                                    Weiss/Trial
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="planoRB" id="ipaRB" value="Ipa">
                                                                                <label class="form-check-label" for="ipaRB">
                                                                                    Ipa
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="planoRB" id="trapistaRB" value="Trapista" checked>
                                                                                <label class="form-check-label" for="trapistaRB">
                                                                                    Trapista
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </fieldset>
                                                                <fieldset class="form-group">
                                                                    <div class="row">
                                                                        <legend class="col-form-label col-sm-2 pt-0">Status</legend>
                                                                        <div class="col-sm-10">
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="statusRB" id="pagaRB" value="Paga">
                                                                                <label class="form-check-label" for="pagaRB">
                                                                                    Paga
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="statusRB" id="emAbertoRB" value="emAberto" checked>
                                                                                <label class="form-check-label" for="emAbertoRB">
                                                                                    Em aberto
                                                                                </label>
                                                                            </div>
                                                                            <div class="form-check">
                                                                                <input class="form-check-input" type="radio" name="statusRB" id="vencidaRB" value="Vencida">
                                                                                <label class="form-check-label" for="vencidaRB">
                                                                                    Vencida
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                        </div>
                                                                    </fieldset>
                                                                    <div class="form-group row">
                                                                        <label for="vencimento" class="col-sm-2 col-form-label pr-1">Vencimento</label>
                                                                        <div class="col-sm-10" >
                                                                            <input type="date" class="form-control" id="vencimento">
                                                                        </div>
                                                                    </div>
                                                                    <div class="form-group row">
                                                                        <label for="valor" class="col-sm-2 col-form-label pr-1">Valor</label>
                                                                        <div class="input-group-prepend col-1">
                                                                                <span class="input-group-text" id="validatedInputGroupPrepend">R$</span>
                                                                        </div>
                                                                        <div class="col-9" >
                                                                            <input type="text" class="form-control" id="valor">
                                                                        </div>
                                                                    </div>
                                                            </form>
                                                        </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
                                                        <button type="button" class="btn btn-dark">Salvar mudanças</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> 
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table> 
                    </div>
                </div>
            </div>
        </section>

        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    </body>
    <footer class="mt-5">
        <div class="container-fluid bg-dark">
            <div class="row">
                <div class="col">
                    <p class="lead text-center text-white">
                        © Copyright 4° ano de infomática do ano de 2020. Todos os Direitos Reservados.
                    </p>
                </div>
            </div>
        </div>
    </footer> 
</html>
