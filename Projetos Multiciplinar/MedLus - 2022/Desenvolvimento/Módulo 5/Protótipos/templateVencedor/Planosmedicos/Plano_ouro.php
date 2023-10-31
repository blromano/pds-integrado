<?php
    $pagina = "Plano_ouro";
    $footerColado = True;
    include "../view/config.php";
    include "../view/header.php";
?>
<section class="container mt-5">
    <h1 class="mt-3">
        Planos Gold  
    </h1>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th scope="col">Nome</th>
                <th scope="col">CPF</th>
                <th scope="col">E-mail</th>
                <th scope="col">Situação</th>
                <th scope="col">Histórico de pagamentos</th>
                <th scope="col" class="actions text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
            <td>Renata Mussulino</td>
                <td> 111.222.333-00 </td>
                <td> Exampleemail@gmail.com</td>
                <td> 
                <select class="form-select" aria-label="Default select example">
                <option selected>Pago</option>
                  <option value="1">Pendente</option>
                  <option value="2">Atrasado</option>
                </select>
                </td>
                <td class= "align-middle text-center"> <button type="button" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Historicopag">Visualizar pagamentos</button></td>
                <td class="align-middle text-center">
                    <a href="#" class="btn btn-sm btn-primary btn_redondo me-4" data-bs-toggle="modal" data-bs-target="#editarpacientegold">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#Desativarplanogold">Desativar</a>
                </tr>
            </td>
            </tr>
            <tr>
            <td>Renata Mussulino</td>
                <td> 111.222.333-00 </td>
                <td> Exampleemail@gmail.com</td>
                <td> 
                <select class="form-select" aria-label="Default select example">
                <option selected>Pago</option>
                  <option value="1">Pendente</option>
                  <option value="2">Atrasado</option>
                </select>
                </td>
                <td class= "align-middle text-center"> <button type="button" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Historicopag">Visualizar pagamentos</button></td>
                <td class="align-middle text-center">
                    <a href="#" class="btn btn-sm btn-primary btn_redondo me-4" data-bs-toggle="modal" data-bs-target="#editarpacientegold">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#Desativarplanogold">Desativar</a>
                </tr>
            </tr>
            <tr>
               <td>Renata Mussulino</td>
                <td> 111.222.333-00 </td>
                <td> Exampleemail@gmail.com</td>
                <td> 
                <select class="form-select" aria-label="Default select example">
                <option selected>Pago</option>
                  <option value="1">Pendente</option>
                  <option value="2">Atrasado</option>
                </select>
                </td>
                <td class= "align-middle text-center"> <button type="button" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Historicopag">Visualizar pagamentos</button></td>
                <td class="align-middle text-center">
                    <a href="#" class="btn btn-sm btn-primary btn_redondo me-4" data-bs-toggle="modal" data-bs-target="#editarpacientegold">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#Desativarplanogold">Desativar</a>
                </tr>
            </tbody>
        <tfoot>
</table>
</section>
 
<div class="modal fade" id="editarpacientegold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
        <h3>Dados</h3>
        <label for="username">Nome do Paciente</label>
        <input type="text" placeholder="Email or Phone" id="username">
        
        <label for="username">CPF</label>
        <input type="text" placeholder="Email or Phone" id="cpfeditar">
        
        <label for="username">E-mail</label>
        <div class="posbotao"> 
          <br>
            <button class="btn btn-primary " type="button" data-bs-toggle="modal" data-bs-target="#Alterar_Dadosplanogold">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
    </form>
    </div>
  </div>
</div>
<div class="modal fade" id="Desativar_confirmacaoplanogold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content"> 
      <div class="modal-body">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
      <h3>Dados</h3>
      <label for="username">Email</label>
      
        <input type="text" placeholder="Digite o Email" id="Formnome">
        
        <label for="username">Senha</label>
        <input type="password" placeholder="Digite a senha" id="Formagencia">

          <button type="button" class ="botaosalvar" data-bs-toggle="modal" data-bs-target="#Confirmar_Desativarplanogold">Confirmar</button>
        </form>
      </div>
      </div>
    </div>
</div>

<!-- Modal-Desativar plano menssagem -->
<div class="modal fade" id="Desativarplanogold" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo desativar? </h5>
      </div>
      <div class="modal-footer">
        <button type="button " class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Desativar_confirmacaoplanogold">Sim</button>
        <button type="button" class="btn btn-secondary btn_redondo" data-bs-dismiss="modal">Não</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal-confirmar desativar-->
<div class="modal fade" id="Confirmar_Desativarplanogold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Paciente desativado com sucesso!</h5>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn_redondo" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados-->
<div class="modal fade" id="Alterar_Dadosplanogold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo alterar os dados?</h5>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Confirmar_Alterar_Dadosplanogold">Sim</button>
        <button type="button" class="btn btn-secondary btn_redondo"data-bs-toggle="modal" data-bs-target="#editarpacientegold">Não</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados confirmado-->
<div class="modal fade" id="Confirmar_Alterar_Dadosplanogold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade" id="Formadicioarplanogold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
        <h3>Dados</h3>
        <label for="username">Nome do Paciente</label>
        <input type="text" placeholder="Email or Phone" id="username">
        
        <label for="username">CPF</label>
        <input type="text" placeholder="Email or Phone" id="cpf">

        <label for="username">E-mail</label>
        <input type="text" placeholder="Email or Phone" id="email">
        <div class="posbotao"> 
            <button class="btn btn-primary btn_redondo" type="button" data-bs-toggle="modal" data-bs-target="#Salvar_Dadosplanogold">Salvar</button>
            <button type="button" class="btn btn-secondary btn_redondo" data-bs-dismiss="modal">Cancelar</button>
        </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados-->
<div class="modal fade" id="Salvar_Dadosplanogold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo adicionar?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Confirmar_Adicionar_Dadosplanogold">Sim</button>
        <button type="button" class="btn btn-secondary btn_redondo"  data-bs-toggle="modal" data-bs-target="#Formadicioarplanogold">Não</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados confirmado-->
<div class="modal fade" id="Confirmar_Adicionar_Dadosplanogold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Paciente adicionado com sucesso!</h5>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<!-- Histórico de Pagamentos -->
<div class="modal fade" id="Historicopag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
    <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
      <h3>Dados</h3>
      <div class="posbotao">   
          <a href="#" class="btn btn-sm btn-success btn_redondo" data-bs-toggle="modal" data-bs-target="#Formadicioarpagamanetos">Adicionar</a>
      </div>
      <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
              <th scope="col">Mês</th>
                  <th scope="col">Data</th>
                  <th scope="col">Vencimento</th>
                  <th scope="col">Valor</th>
                  <th scope="col" class="actions text-center">Ações</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td> Janeiro</td>
                  <td> 10/01/2022 </td>
                  <td> 10/02/2022 </td>
                  <td> R$150,00 </td>
                  <td class="align-middle text-center">
                    <a href="#" class="btn btn-sm btn-primary btn_redondo me-4" data-bs-toggle="modal" data-bs-target="#editarpagamentos">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#desativarpagamentos">Desativar</a>
                </tr>
               </td>
              </tr>
              </td>
              <tr>
                  <td> Ferveveiro</td>
                  <td> 10/02/2022 </td>
                  <td> 10/03/2022 </td>
                  <td> R$150,00 </td>
                  <td class="align-middle text-center">
                    <a href="#" class="btn btn-sm btn-primary btn_redondo me-4" data-bs-toggle="modal" data-bs-target="#editarpagamentos">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#desativarpagamentos">Desativar</a>
                </tr>
               </td>
              </td>
              <tr>
                  <td> Março</td>
                  <td> 10/03/2022 </td>
                  <td> 10/04/2022 </td>
                  <td> R$150,00 </td>
                  <td class="align-middle text-center">
                    <a href="#" class="btn btn-sm btn-primary btn_redondo me-4" data-bs-toggle="modal" data-bs-target="#editarpagamentos">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#desativarpagamentos">Desativar</a>
                </tr>
               </td>
              </td>
              
              </tbody>
          <tfoot>
   </table>
</form>
    </div>
  </div>
</div>

<div class="modal fade" id="editarpagamentos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
        <h3>Dados</h3>
        <label for="username">Data do Pagamento</label>
        <input type="text" placeholder="Email or Phone" id="datapagamentoedt">
    
        <label for="username">Data do Vencimento</label>
        <input type="text" placeholder="Email or Phone" id="datavencimentoedt">

        <label for="username">Valor</label>
        <input type="text" placeholder="Email or Phone" id="datavencimentoedt">
        <div class="posbotao"> 
          <br>
            <button class="btn btn-primary " type="button" data-bs-toggle="modal">Salvar</button>
            <button type="button" class="btn btn-secondary"  data-bs-target="#Historicopag" data-bs-toggle="modal">Cancelar</button>
        </div>
    </form>
    </div>
  </div>
</div>
<!-- Modal-Desativar plano menssagem -->
<div class="modal fade" id="desativarpagamentos" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo desativar? </h5>
      </div>
      <div class="modal-footer">
        <button type="button " class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Confirmar_Desativarpag">Sim</button>
        <button type="button" class="btn btn-secondary btn_redondo" data-bs-toggle="modal" data-bs-target="#Historicopag">Não</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal-confirmar desativar-->
<div class="modal fade" id="Confirmar_Desativarpag" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pagamento desativado com sucesso!</h5>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn_redondo" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- modal-Adicionar plano form-->
<div class="modal fade" id="Formadicioarpagamanetos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
        <h3>Dados</h3>
        <label for="username">Mês</label>
        <input type="text" placeholder="Email or Phone" id="username">
        <label for="username">Data do Pagamento</label>
        <input type="text" placeholder="Email or Phone" id="datapagamento">
    
        <label for="username">Data do Vencimento</label>
        <input type="text" placeholder="Email or Phone" id="datavencimento">

        <label for="username">Valor</label>
        <input type="text" placeholder="Email or Phone" id="datavencimento">
        <div class="posbotao"> 
            <button class="btn btn-primary btn_redondo" type="button" data-bs-toggle="modal" data-bs-target="#Salvar_Dadosplanogold">Salvar</button>
            <button type="button" class="btn btn-secondary btn_redondo" ddata-bs-toggle="modal" data-bs-target="#Historicopag">Cancelar</button>
        </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados-->
<div class="modal fade" id="Salvar_Dadosplanogold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo adicionar?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Confirmar_Adicionar_Dadosplanogold">Sim</button>
        <button type="button" class="btn btn-secondary btn_redondo"  data-bs-toggle="modal" data-bs-target="#Formadicioarplanodima">Não</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados confirmado-->
<div class="modal fade" id="Confirmar_Adicionar_Dadosplanogold" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pagamento adicionado com sucesso!</h5>
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