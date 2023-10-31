<?php
    $pagina = "Ouvidoria";
    $footerColado = True;
    include "../view/config.php";
    include "../view/header.php";
?>
<section class="container mt-5">
    <h1 class="mt-3">
        Ouvidoria
    </h1>


<table id="example" class="table table-striped table-bordered align-middle" style="width:100%">
        <thead>
            <tr>
            <th scope="col">Nome</th>
                <th scope="col">Recado</th>
                <th scope="col">Motivo</th>
                <th scope="col">Identificação</th>
                <th scope="col">Situação</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>Renata Mussulino</td>
            <td> <button type="button" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Mensagemouv">Visualizar mensagem</button></td>
                <td> Área de motivo</td>
                <td> Área de identificação</td>
                <td> 
                <select class="form-select" aria-label="Default select example">
                <option selected>Não Verificada</option>
                  <option value="1">Resolvida</option>
                  <option value="2">Aberto</option>
                </select>
            </tr>
            <tr>
                <td>Renata Mussulino</td>
                <td> <button type="button" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Mensagemouv">Visualizar mensagem</button></td>
                <td> Área de motivo</td>
                <td> Área de identificação</td>
                <td> 
                <select class="form-select" aria-label="Default select example">
                <option selected>Não Verificada</option>
                  <option value="1">Resolvida</option>
                  <option value="2">Aberto</option>
                </select>
                </td>
            </tr>
            <tr>
               <td>Renata Mussulino</td>
               <td> <button type="button" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Mensagemouv">Visualizar mensagem</button></td>
                <td> Área de motivo</td>
                <td> Área de identificação</td>
                <td> 
                <select class="form-select" aria-label="Default select example">
                <option selected>Não Verificada</option>
                  <option value="1">Resolvida</option>
                  <option value="2">Aberto</option>
                </select>
                </td>
                </tr>
            </tbody>
        <tfoot>
</table>
</section>
 
<div class="modal fade" id="Mensagemouv" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
        <h3>Mensagem</h3>
        <p class="text-break">A amizade consegue ser tão complexa...
Deixa uns desanimados, outros bem felizes...
É a alimentação dos fracos
É o reino dos fortes

Faz-nos cometer erros
Os fracos deixam se ir abaixo
Os fortes erguem sempre a cabeça
os assim assim assumem-os

Sem pensar conquistamos
O mundo geral
e construímos o nosso pequeno lugar
deixando brilhar cada estrelinha

Estrelinhas...
Doces, sensíveis, frias, ternurentas...
Mas sempre presentes em qualquer parte
Os donos da amizade...

Desconhecido</p>
        <div class="posbotao"> 
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
        </div>
    </form>
    </div>
  </div>
</div>
<?php
    include "../view/footer.php";
?>