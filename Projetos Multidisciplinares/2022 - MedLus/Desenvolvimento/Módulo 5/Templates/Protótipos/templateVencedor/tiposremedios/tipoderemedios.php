<?php
    $pagina = "tiposremedios";
    $footerColado = True;
    include "../view/config.php";
    include "../view/header.php";
?>
<section class="container mt-5">
    <h1 class="mt-3">
        Tipo de Remédios  
    </h1>
    <div class="posbotao">   
<button class="btn btn-sm btn-success btn_redondo" data-bs-toggle="modal" data-bs-target="#Formadicioartiporemedio">Adicionar</button>
</div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th scope="col">Nome</th>
                <th scope="col">Observações</th>
                <th scope="col" class="actions text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Antibiótico </td>
                <td> Campo de Observação </td>
                <td class="align-middle text-center">
                    <a href="tipo1.php" class="btn btn-success btn_redondo btn-sm corbt">Visualizar</a>
                    <a href="#" class="btn btn-sm btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#tiporemedioeditar">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#tiporemediodestivar">Desativar</a>
                </tr>
            </td>
            </tr>
            <tr>
            <td>Gardenal </td>
                <td> Campo de Observação </td>
                <td class="align-middle text-center">
                    <a href="tipo2.php" class="btn btn-success btn_redondo btn-sm corbt">Visualizar</a>
                    <a href="#" class="btn btn-sm btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#tiporemedioeditar">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#tiporemediodestivar">Desativar</a>
                </tr>
            </tr>
            <tr>
            <td>Tipo3 </td>
                <td> Campo de Observação </td>
                <td class="align-middle text-center">
                    <a href="tipo3.php" class="btn btn-success btn_redondo btn-sm corbt">Visualizar</a>
                    <a href="#" class="btn btn-sm btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#tiporemedioeditar">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#tiporemediodestivar">Desativar</a>
                </tr>
            </tbody>
        <tfoot>
</table>
</section>
 
<div class="modal fade" id="tiporemedioeditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
        <h3>Dados</h3>
        <label for="username">Nome</label>
        <input type="text" placeholder="Email or Phone" id="username">
        
        <label for="username">Onbservação</label>
        <input type="text" placeholder="Email or Phone" id="Formagencia">
        <div class="posbotao"> 
          <br>
            <button class="btn btn-primary " type="button" data-bs-toggle="modal" data-bs-target="#Alterar_Dadostiporemedio">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="Desativar_confirmacaotiporemedio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content"> 
      <div class="modal-body">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
      <h3>Dados</h3>
      <label for="username">Email</label>
      
        <input type="text" placeholder="Digite o Email" id="Formnome">
        
        <label for="username">Senha</label>
        <input type="password" placeholder="Digite a senha" id="Formagencia">

          <button type="button" class ="botaosalvar" data-bs-toggle="modal" data-bs-target="#Confirmar_Desativartiporemedio">Confirmar</button>
        </form>
      </div>
      </div>
    </div>
</div>

<!-- Modal-Desativar plano menssagem -->
<div class="modal fade" id="tiporemediodestivar" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo desativar o plano médico? </h5>
      </div>
      <div class="modal-footer">
        <button type="button " class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Desativar_confirmacaotiporemedio">Sim</button>
        <button type="button" class="btn btn-secondary btn_redondo" data-bs-dismiss="modal">Não</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal-confirmar desativar-->
<div class="modal fade" id="Confirmar_Desativartiporemedio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tipo de remedio desativado com sucesso!</h5>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn_redondo" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados-->
<div class="modal fade" id="Alterar_Dadostiporemedio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo alterar os dados?</h5>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Confirmar_Alterar_Dadostiporemedio">Sim</button>
        <button type="button" class="btn btn-secondary btn_redondo" data-bs-toggle="modal" data-bs-target="#tiporemedioeditar">Não</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados confirmado-->
<div class="modal fade" id="Confirmar_Alterar_Dadostiporemedio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informações alteradas com sucesso!</h5>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn_redondo" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- modal-Adicionar plano form-->
<div class="modal fade" id="Formadicioartiporemedio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
        <h3>Dados</h3>
        <label for="username">Nome</label>
        <input type="text" placeholder="Email or Phone" id="username">
        
        <label for="username">Onbservação</label>
        <input type="text" placeholder="Email or Phone" id="Formagencia">
        
        <div class="posbotao"> 
            <button class="btn btn-primary btn_redondo" type="button" data-bs-toggle="modal" data-bs-target="#Salvar_Dadostiporemedio">Salvar</button>
            <button type="button" class="btn btn-secondary btn_redondo" data-bs-dismiss="modal">Cancelar</button>
        </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados-->
<div class="modal fade" id="Salvar_Dadostiporemedio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo adicionar?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Confirmar_Adicionar_Dadostiporemedio">Sim</button>
        <button type="button" class="btn btn-secondary btn_redondo" data-bs-toggle="modal" data-bs-target="#Formadicioartiporemedio">Não</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados confirmado-->
<div class="modal fade" id="Confirmar_Adicionar_Dadostiporemedio" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tipo de remédio adicionado com sucesso!</h5>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<?php
    include "../view/footer.php";
?>