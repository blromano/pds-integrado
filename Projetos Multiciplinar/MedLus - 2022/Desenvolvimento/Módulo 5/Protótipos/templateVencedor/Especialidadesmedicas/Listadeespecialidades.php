<?php
    $pagina = "Listadeespecialidades";
    $footerColado = True;
    include "../view/config.php";
    include "../view/header.php";
?>
<section class="container mt-5">
    <h1 class="mt-3">
        Especialidades
    </h1>
    <div class="posbotao">   
<button class="btn btn-sm btn-success btn_redondo" data-bs-toggle="modal" data-bs-target="#Formadicionarespecialidades">Adicionar</button>
</div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th scope="col">Nome</th>
                <th scope="col" class="actions text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Neurologista </td>
                <td class="align-middle text-center">
                    <a href="especialidade1.php" class="btn btn-success btn_redondo btn-sm corbt">Visualizar</a>
                    <a href="#" class="btn btn-sm btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#especialidadeseditar">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#especialidadesdesativar">Desativar</a>
                </tr>
            </td>
            </tr>
            <tr>
            <td>Cardiologista</td>
                <td class="align-middle text-center">
                    <a href="especialidade2.php" class="btn btn-success btn_redondo btn-sm corbt">Visualizar</a>
                    <a href="#" class="btn btn-sm btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#especialidadeseditar">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#especialidadesdesativar">Desativar</a>
                </tr>
            </tr>
            <tr>
            <td>Endócrinologista</td>
                <td class="align-middle text-center">
                    <a href="especialidade3.php" class="btn btn-success btn_redondo btn-sm corbt">Visualizar</a>
                    <a href="#" class="btn btn-sm btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#especialidadeseditar">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#especialidadesdesativar">Desativar</a>
                </tr>
            </tbody>
        <tfoot>
</table>
</section>
 
<div class="modal fade" id="especialidadeseditar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
        <h3>Dados</h3>
        <label for="username">Nome</label>
        <input type="text" placeholder="Email or Phone" id="username">
          <br>
          <div class="posbotao">
            <button class="btn btn-primary " type="button" data-bs-toggle="modal" data-bs-target="#Alterar_Dadosespecialidade">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
    </form>
    </div>
  </div>
</div>

<div class="modal fade" id="Desativar_confirmacaoespecialidade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content"> 
      <div class="modal-body">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
      <h3>Dados</h3>
      <label for="username">Email</label>
      
        <input type="text" placeholder="Digite o Email" id="Formnome">
        
        <label for="username">Senha</label>
        <input type="password" placeholder="Digite a senha" id="Formagencia">

          <button type="button" class ="botaosalvar" data-bs-toggle="modal" data-bs-target="#Confirmar_Desativarespecialidade">Confirmar</button>
        </form>
      </div>
      </div>
    </div>
</div>

<!-- Modal-Desativar plano menssagem -->
<div class="modal fade" id="especialidadesdesativar" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo desativar? </h5>
      </div>
      <div class="modal-footer">
        <button type="button " class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Desativar_confirmacaoespecialidade">Sim</button>
        <button type="button" class="btn btn-secondary btn_redondo" data-bs-dismiss="modal">Não</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal-confirmar desativar-->
<div class="modal fade" id="Confirmar_Desativarespecialidade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Especialidade desativado com sucesso!</h5>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn_redondo" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados-->
<div class="modal fade" id="Alterar_Dadosespecialidade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo alterar os dados?</h5>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Confirmar_Alterar_Dadosespecialidade">Sim</button>
        <button type="button" class="btn btn-secondary btn_redondo" data-bs-toggle="modal" data-bs-target="#especialidadeseditar">Não</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados confirmado-->
<div class="modal fade" id="Confirmar_Alterar_Dadosespecialidade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade" id="Formadicionarespecialidades" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
        <h3>Dados</h3>
        <label for="username">Nome</label>
        <input type="text" placeholder="Email or Phone" id="username">
        
        
        <div class="posbotao"> 
            <button class="btn btn-primary btn_redondo" type="button" data-bs-toggle="modal" data-bs-target="#Salvar_Dadosespecialidade">Salvar</button>
            <button type="button" class="btn btn-secondary btn_redondo" data-bs-dismiss="modal">Cancelar</button>
        </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados-->
<div class="modal fade" id="Salvar_Dadosespecialidade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo adicionar?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Confirmar_Adicionar_Dadosespecialidade">Sim</button>
        <button type="button" class="btn btn-secondary btn_redondo" data-bs-toggle="modal" data-bs-target="#Formadicionarespecialidades">Não</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados confirmado-->
<div class="modal fade" id="Confirmar_Adicionar_Dadosespecialidade" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Especialidade adicionado com sucesso!</h5>
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