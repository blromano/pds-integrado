<?php
    $pagina = "tabela";
    $footerColado = True;
    include "config.php";
    include "header.php";
?>
<section class="container mt-5">
    <h1 class="mt-3">
        Planos Médicos  
    </h1>
    <div class="posbotao">   
<button class="btn btn-sm btn-success btn_redondo" data-bs-toggle="modal" data-bs-target="#Formadicioar">Adicionar</button>
</div>
<table id="example" class="table table-striped table-bordered" style="width:100%">
        <thead>
            <tr>
            <th scope="col">Nome</th>
                <th scope="col">Agência</th>
                <th scope="col">Preço</th>
                <th scope="col">Qtd de Consultas</th>
                <th scope="col">Qtd de Exames</th>
                <th scope="col">Contato</th>
                <th scope="col" class="actions text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Plano Platina </td>
                <td> Unimed </td>
                <td>R$109,99</td>
                <td> 15 </td>
                <td> 20 </td>
                <td> +55 (19)999999999 </td>
                <td class="action-row">
                    <a href="#" class="btn btn-success btn_redondo btn-sm corbt" data-bs-toggle="modal" data-bs-target="#Formdados">Comprar</a>
                    <a href="#" class="btn btn-sm btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Formdados">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#Desativar">Desativar</a>
                </tr>
            </td>
            </tr>
            <tr>
                <td>Plano Gold</td>
                <td>Unimed</td>
                <td>R$94,99</td>
                <td>  10 </td>
                <td>  15</td>
                <td>  +55 (19) 988888888 </td>
                <td class="action-row">
                   <a href="#" class="btn btn-success btn_redondo btn-sm corbt" data-bs-toggle="modal" data-bs-target="#Formdados">Comprar</a>
                    <a href="#" class="btn btn-sm btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Formdados">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#Desativar">Desativar</a>
                </tr>
            </tr>
            <tr>
            <td>Plano Diamante</td>
                <td>Unimed</td>
                <td>R$159,99</td>
                <td>  20 </td>
                <td>  25 </td>
                <td>  +55 (17) 977777777 </td>
                <td class="action-row">
                    <a href="#" class="btn btn-success btn_redondo btn-sm corbt" data-bs-toggle="modal" data-bs-target="#Formdados">Comprar</a>
                    <a href="#" class="btn btn-sm btn-primary btn_redondo" data-bs-toggle="modal" data-bs-target="#Formdados">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger btn_redondo" data-bs-toggle="modal" data-bs-target="#Desativar">Desativar</a>
                </tr>
            </tbody>
        <tfoot>
</table>
</section>
    <!-- <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Agência</th>
                <th scope="col">Preço</th>
                <th scope="col">Qtd de Consultas</th>
                <th scope="col">Qtd de Exames</th>
                <th scope="col">Contato</th>
                <th scope="col" class="actions text-center">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>Renata Mussulino</td>
                <td> Unimed </td>
                <td>R$109,99</td>
                <td> 15 </td>
                <td> 27 </td>
                <td> +55 (19)999999999 </td>
                <td class="action-row">
                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#Formdados">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Desativar">Desativar</a>
                </tr>
            </td>
            <tr>
                <td>Edilson Diniz Silvestre</td>
                <td>Unimed</td>
                <td>R$94,99</td>
                <td>  10 </td>
                <td>  20 </td>
                <td>  +55 (19) 988888888 </td>
                <td class="action-row">
                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#Formdados">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Desativar">Desativar</a>
                </tr>
            </tr>
            <tr>
                <td>Tarcizo Roberto</td>
                <td>Unimed</td>
                <td>R$94,99</td>
                <td>  11 </td>
                <td>  25 </td>
                <td>  +55 (17) 977777777 </td>
                <td class="action-row">
                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#Formdados">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Desativar">Desativar</a>
                </tr>
            </tr>
            <tr>
                <td>Alberto Silva Rodrigues</td>
                <td>Unimed</td>
                <td>R$94,99</td>
                <td>  5 </td>
                <td>  9 </td>
                <td>  +55 (17) 966666666 </td>
                <td class="action-row">
                    <a href="#" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#Formdados">Editar</a>
                    <a href="#" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#Desativar">Desativar</a>
                </tr>
            </tr>
        </tbody>
    </table> -->
<div class="modal fade" id="Formdados" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <form action="" method="POST" class="col-sm-12 col-md-6 col-lg-3 w-100">
        <h3>Dados</h3>
        <label for="username">Nome</label>
        <input type="text" placeholder="Email or Phone" id="username">
        
        <label for="username">Agência</label>
        <input type="text" placeholder="Email or Phone" id="Formagencia">
        
        <label for="username">Preço</label>
        <input type="text" placeholder="Email or Phone" id="Formqtdconsultas">

        <label for="username">Quantidade de Consultas</label>
        <input type="text" placeholder="Email or Phone" id="Formqtdexames">

        <label for="username">Quantidade de Exames</label>
        <input type="text" placeholder="Email or Phone" id="Formqtdexames">
    
        <label for="username">Contato</label>
        <input type="text" placeholder="Email or Phone" id="Formcontato">
        <div class="posbotao"> 
          <br>
            <button class="btn btn-primary " type="button" data-bs-toggle="modal" data-bs-target="#Alterar_Dados">Salvar</button>
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
        </div>
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
        <input type="text" placeholder="Email or Phone" id="Formnomead">
        
        <label for="username">Agência</label>
        <input type="text" placeholder="Email or Phone" id="Formagenciaad">
        
        <label for="username">Preço</label>
        <input type="text" placeholder="Email or Phone" id="Formqtdconsultasad">

        <label for="username">Quantidade de Consultas</label>
        <input type="text" placeholder="Email or Phone" id="Formqtdexamesad">

        <label for="username">Quantidade de Exames</label>
        <input type="text" placeholder="Email or Phone" id="Formqtdexamesad">
    
        <label for="username">Contato</label>
        <input type="text" placeholder="Email or Phone" id="Formcontatoad">
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
        <button type="button" class="btn btn-secondary btn_redondo" data-bs-dismiss="modal">Não</button>
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
    include "footer.php";
?>