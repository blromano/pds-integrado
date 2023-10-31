<?php
    $pagina = "tabela";
    $footerColado = True;
    include "../view/config.php";
    include "../view/header.php";
?>
<section class="container mt-5">
    <h1 class="mt-3">
        Consultas 
    </h1>
    <div class="posbotao">   
<button class="btn btn-sm btn-success btn_redondo" data-bs-toggle="modal" data-bs-target="#Formadicioar">Adicionar</button>
</div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th scope="col">Nome</th>
                <th scope="col">Especialidade</th>
                <th scope="col" class="actions text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Nailson Batista</td>
                <td> Urologista </td>
                <td class="action-row">
                    <a href="#" class="btn btn-success btn_redondo btn-sm corbt" data-bs-toggle="modal" data-bs-target="#dados2">+</a>
                </tr>
            </td>
            </tr>
            <tr>
                <td>Andressa Azevedo</td>
                <td> Dermatologista </td>
                <td class="action-row">
                   <a href="#" class="btn btn-success btn_redondo btn-sm corbt" data-bs-toggle="modal" data-bs-target="#dados1">+</a>
                </tr>
            </tr>
            <tr>
            <td>Pedro Rochcruch</td>
                <td> Ginecologista </td>
                <td class="action-row">
                    <a href="#" class="btn btn-success btn_redondo btn-sm corbt" data-bs-toggle="modal" data-bs-target="#dados3">+</a>
                </tr>
            </tbody>
        <tfoot>
</table>
</section>
 
<div class="modal fade" id="dados1" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
    <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
     <h3>Dados</h3>
      <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
              <th scope="col">Nome</th>
                  <th scope="col">Especialidade</th>
                  <th scope="col">Qtd de Consultas</th>
                  <th scope="col">Valor da consulta</th>
                  <th scope="col">Mês e ano</th>
                  <th scope="col">Plano Médico</th>
                  <th scope="col">Valor total</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td> Andressa Azevedo </td>
                  <td> Dermatologista </td>
                  <td> 2 </td>
                  <td> R$100,00 </td>
                  <td> 05/2022 </td>
                  <td> Gold </td>
                  <td> R$200,00 </td>
                  </tr>
              </td>
              <tr>
                  <td> Andressa Azevedo </td>
                  <td> Dermatologista </td>
                  <td> 2 </td>
                  <td> R$100,00 </td>
                  <td> 05/2022 </td>
                  <td> Gold </td>
                  <td> R$200,00 </td>
                  </tr>
              </td>
              <tr>
                  <td> Andressa Azevedo </td>
                  <td> Dermatologista </td>
                  <td> 2 </td>
                  <td> R$100,00 </td>
                  <td> 05/2022 </td>
                  <td> Gold </td>
                  <td> R$200,00 </td>
                  </tr>
              </td>
              <tr>
                <td colspan="6" class="table-active text-center">Total do ano</td>
                  <td> R$600,00 </td>
            </tr>
            </tbody>
          <tfoot>
        </table>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="dados2" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
      <h3>Dados</h3>
        <table id="example" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                <th scope="col">Nome</th>
                    <th scope="col">Especialidade</th>
                    <th scope="col">Qtd de Consultas</th>
                    <th scope="col">Valor da consulta</th>
                    <th scope="col">Mês e ano</th>
                    <th scope="col">Plano Médico</th>
                    <th scope="col">Valor total</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td> Nailson Batista </td>
                    <td> Urologista </td>
                    <td> 3 </td>
                    <td> R$150,00 </td>
                    <td> 04/2022 </td>
                    <td> Platina </td>
                    <td> R$450,00 </td>
                    </tr>
                </td>
                <tr>
                    <td> Nailson Batista </td>
                    <td> Urologista </td>
                    <td> 3 </td>
                    <td> R$150,00 </td>
                    <td> 04/2022 </td>
                    <td> Platina </td>
                    <td> R$450,00 </td>
                    </tr>
                </td>
                <tr>
                    <td> Nailson Batista </td>
                    <td> Urologista </td>
                    <td> 3 </td>
                    <td> R$150,00 </td>
                    <td> 04/2022 </td>
                    <td> Platina </td>
                    <td> R$450,00 </td>
                    </tr>
                </td>
                <tr>
                  <td colspan="6" class="table-active text-center">Total do ano</td>
                  <td> R$1350,00 </td>
                </tr>
                </tbody>
            <tfoot>
        </table>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="dados3" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl">
    <div class="modal-content">
    <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
    <h3>Dados</h3>
      <table id="example" class="table table-striped table-bordered" style="width:100%">
          <thead>
              <tr>
              <th scope="col">Nome</th>
                  <th scope="col">Especialidade</th>
                  <th scope="col">Qtd de Consultas</th>
                  <th scope="col">Valor da consulta</th>
                  <th scope="col">Mês e ano</th>
                  <th scope="col">Plano Médico</th>
                  <th scope="col">Valor total</th>
              </tr>
          </thead>
          <tbody>
              <tr>
                  <td> Pedro Rochcruch </td>
                  <td> Ginecologista </td>
                  <td> 4 </td>
                  <td> R$250,00 </td>
                  <td> 06/2022 </td>
                  <td> Diamante </td>
                  <td> R$1000,00 </td>
                  </tr>
              </td>
              <tr>
                  <td> Pedro Rochcruch </td>
                  <td> Ginecologista </td>
                  <td> 4 </td>
                  <td> R$250,00 </td>
                  <td> 06/2022 </td>
                  <td> Diamante </td>
                  <td> R$1000,00 </td>
                  </tr>
              </td>
              <tr>
                  <td> Pedro Rochcruch </td>
                  <td> Ginecologista </td>
                  <td> 4 </td>
                  <td> R$250,00 </td>
                  <td> 06/2022 </td>
                  <td> Diamante </td>
                  <td> R$1000,00 </td>
                  </tr>
              </td>
              <tr>
                  <td colspan="6" class="table-active text-center">Total do ano</td>
                  <td> R$3000,00 </td>
            </tr>
              </tbody>
          <tfoot>
        </table>
      </form>
    </div>
  </div>
</div>

<div class="modal fade" id="Desativar_confirmacao" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content"> 
      <div class="modal-body">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
      <h3>Dados</h3>
      <label for="username">Email</label>
      
        <input type="text" placeholder="Digite o Email" id="Formnome">
        
        <label for="username">Senha</label>
        <input type="password" placeholder="Digite a senha" id="Formagencia">

          <button type="button" class ="botaosalvar" data-bs-toggle="modal" data-bs-target="#Confirmar_Desativar">Confirmar</button>
        </form>
      </div>
      </div>
    </div>
</div>

<!-- Modal-Desativar plano menssagem -->
<div class="modal fade" id="Desativar" data-bs-backdrop="static" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo desativar o plano médico? </h5>
      </div>
      <div class="modal-footer">
        <button type="button " class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Desativar_confirmacao">Sim</button>
        <button type="button" class="btn btn-secondary btn_redondo" data-bs-dismiss="modal">Não</button>
      </div>
    </div>
  </div>
</div>
<!-- Modal-confirmar desativar-->
<div class="modal fade" id="Confirmar_Desativar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Plano Médico desativado com sucesso!</h5>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn_redondo" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados-->
<div class="modal fade" id="Alterar_Dados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo alterar os dados?</h5>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Confirmar_Alterar_Dados">Sim</button>
        <button type="button" class="btn btn-secondary btn_redondo" data-bs-dismiss="modal">Não</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados confirmado-->
<div class="modal fade" id="Confirmar_Alterar_Dados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
<div class="modal fade" id="Formadicioar" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
        <h3>Dados</h3>
        <label for="username">Nome</label>
        <input type="text" placeholder="Digite o nome" id="Formnomead">
        
        <label for="username">Especialidade</label>
        <input type="text" placeholder="Digite a especialidade" id="Formagenciaad">
        
        <div class="posbotao"> 
            <button class="btn btn-primary btn_redondo" type="button" data-bs-toggle="modal" data-bs-target="#Salvar_Dados">Salvar</button>
            <button type="button" class="btn btn-secondary btn_redondo" data-bs-dismiss="modal">Cancelar</button>
        </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados-->
<div class="modal fade" id="Salvar_Dados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Deseja mesmo adicionar?</h5>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Confirmar_Adicionar_Dados">Sim</button>
        <button type="button" class="btn btn-secondary btn_redondo" data-bs-toggle="modal" data-bs-target="#Formadicioar"">Não</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal-Alterar dados confirmado-->
<div class="modal fade" id="Confirmar_Adicionar_Dados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Informações alteradas com sucesso!</h5>
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