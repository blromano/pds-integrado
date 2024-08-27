
<style>
* {
  box-sizing: border-box;
}

input[type=text], select, textarea {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

input[type=date] {
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}

label {
  padding: 12px 12px 12px 0;
  display: inline-block;
}

.exemplo1 input[type=checkbox] + label{
    background-position:0 -60px; /* Muda a posição do background só no checkbox */
}
 
input[type=submit] {
  background-color: #4CAF50;
  color: white;
  padding: 12px 20px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
}

.container {
  border-radius: 5px;
  background-color: #f2f2f2;
}

.col-25 {
  margin-left: 15px;
  float: left;
  width: 30%;
  margin-top: 6px;
  margin-left: 150px;
}

.col-75 {
  float: left;
  width: 50%;
  margin-top: 6px;
}



/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - when the screen is less than 600px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .col-25, .col-75, input[type=submit] {
    width: 100%;
    margin-top: 0;
  }
}

</style>
<!--
<div class="container">
    <center><h2>CADASTRO DE TAREFAS</h2></center>
    <br>
  <form action="/action_page.php">
  <div class="row">
    <div class="col-25">
      <label for="nometarefa">Nome da Tarefa</label>
    </div>
    <div class="col-75">
      <input type="text" id="nometarefa" name="nometarefa" placeholder="Nome da Tarefa">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Descrição</label>
    </div>
    <div class="col-75">
      <input type="text" id="descricao" name="descricao" placeholder="Descrição">
    </div>
  </div>
      <div class="row">
    <div class="col-25">
      <label for="lname">Data Realização</label>
    </div>
    <div class="col-75">
      <input type="date" id="datarealizacao" name="datarealizacao">
    </div>
  </div>    
  <div class="row">
    <div class="col-25">
      <label for="country">Funcionário Responsável</label>
    </div>
    <div class="col-75">
      <select id="funcionarioresponsavel" name="funcionarioresponsavel">
        <option value="lindinha">Lindinha</option>
        <option value="florzinha">Florzinha</option>
        <option value="docinho">Docinho</option>
      </select>
    </div>
  </div>
      <div class="row">
    <div class="col-25">
      <label for="country">Setor</label>
    </div>
    <div class="col-75">
      <select id="setor" name="setor">
        <option value="cozinha">Cozinha</option>
        <option value="quarto">Quarto</option>
        <option value="sala">Sala</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Observações</label>
    </div>
    <div class="col-75">
      <textarea id="observacoes" name="observacoes" placeholder="Produtos específicos e outros" style="height:200px"></textarea>
    </div>
  </div>
      <br>
  <div class="form-group caixa-pesquisa-div text-center" style="margin-right: 10px;">
      <input type="submit" value="Cadastrar">
  </div>
      <br>
      <br>
      <br>
  </form>
    <br>
<br>
<br>
</div>
-->
<style>
.container {
  display: block;
  position: relative;
  padding-left: 35px;
  margin-bottom: 12px;
  cursor: pointer;
  font-size: 22px;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* Hide the browser's default checkbox */
.container input {
  position: absolute;
  opacity: 0;
  cursor: pointer;
  height: 0;
  width: 0;
}

/* Create a custom checkbox */
.checkmark {
  position: absolute;
  top: 0;
  left: 0;
  height: 25px;
  width: 25px;
  background-color: #eee;
}

/* On mouse-over, add a grey background color */
.container:hover input ~ .checkmark {
  background-color: #ccc;
}

/* When the checkbox is checked, add a blue background */
.container input:checked ~ .checkmark {
  background-color: #2196F3;
}

/* Create the checkmark/indicator (hidden when not checked) */
.checkmark:after {
  content: "";
  position: absolute;
  display: none;
}

/* Show the checkmark when checked */
.container input:checked ~ .checkmark:after {
  display: block;
}

/* Style the checkmark/indicator */
.container .checkmark:after {
  left: 9px;
  top: 5px;
  width: 5px;
  height: 10px;
  border: solid white;
  border-width: 0 3px 3px 0;
  -webkit-transform: rotate(45deg);
  -ms-transform: rotate(45deg);
  transform: rotate(45deg);
}
</style>
<!--LISTA DE TAREFAS
<div class="container">
    <center><h2>LISTA DE TAREFAS</h2></center>
    <br>
<div class="col-xs-4">
    <div class="form-group">
        <label for="unidadeVolume">Busca por Funcionário:</label>
        <select class="selectpicker" data-size="5" data-live-search="true" data-width="100%" name="unidadeVolume" required>
            <option selected disabled>Escolha o funcionário responsável</option>
            <option>Pucca</option>
            <option>Toby</option>
        </select>
    </div>
</div>
<br>
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Status</th>
      <th scope="col">Nome</th>
      <th scope="col">Data</th>
      <th scope="col">Setor</th>
      <th scope="col">Responsável</th>
      <th scope="col">Ações</th>
    </tr>
  </thead>
  <tbody>
    <tr>
        <td><label class="container">
  <input type="checkbox"><span class="checkmark"></span>
            </label></td>

      <td>Limpar lençóis</td>
      <td>10/05/2019</td>
      <td>Quarto A</td>
      <td>Lindinha</td>
      <td><i class="fas fa-edit"></i>
      <i class="fas fa-times"></i></td>
    </tr>
    <tr>
        <td><label class="container">
  <input type="checkbox"><span class="checkmark"></span>
            </label></td>

      <td>Lavar roupa</td>
      <td>10/05/2019</td>
      <td>Lavanderia</td>
      <td>Lindinha</td>
      <td><i class="fas fa-edit"></i>
      <i class="fas fa-times"></i></td>
    </tr>
    <tr>
        <td><label class="container">
  <input type="checkbox"><span class="checkmark"></span>
            </label></td>

      <td>Limpar mesa</td>
      <td>10/05/2019</td>
      <td>Cozinha</td>
      <td>Florzinha</td>
      <td><i class="fas fa-edit"></i>
      <i class="fas fa-times"></i></td>
    </tr>
  </tbody>
</table>
<br>
<br>
<br>
<br>
<br>
</div>
-->
<!-- POP UP EXCLUIR TAREFA
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">NOTIFICAÇÃO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Tem certeza que deseja excluir essa tarefa?
        Ela não poderá ser recuperada</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Confirmar</button>
      </div> 
    </div>
  </div>
</div>-->

<!--POP UP TAREFAS CONCLUIDAS
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">NOTIFICAÇÃO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Todas as tarefas foram concluídas.
        <br>Setor(es):
            <p>Cozinha, Sala
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fechar</button>
        <button type="button" class="btn btn-primary">Criar novas</button>
      </div>
    </div>
  </div>
</div>-->

<!--EDIÇÃO DE TAREFAS
<br>
<br>
<br>
<div class="container">
    <center><h2>EDIÇÃO DE TAREFAS</h2></center>
    <br>
  <form action="/action_page.php">
  <div class="row">
    <div class="col-25">
      <label for="nometarefa">Nome da Tarefa</label>
    </div>
    <div class="col-75">
      <input type="text" id="nometarefa" name="nometarefa" placeholder="Nome da Tarefa">
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="lname">Descrição</label>
    </div>
    <div class="col-75">
      <input type="text" id="descricao" name="descricao" placeholder="Descrição">
    </div>
  </div>
      <div class="row">
    <div class="col-25">
      <label for="lname">Data Realização</label>
    </div>
    <div class="col-75">
      <input type="date" id="datarealizacao" name="datarealizacao">
    </div>
  </div>    
  <div class="row">
    <div class="col-25">
      <label for="country">Funcionário Responsável</label>
    </div>
    <div class="col-75">
      <select id="funcionarioresponsavel" name="funcionarioresponsavel">
        <option value="lindinha">Lindinha</option>
        <option value="florzinha">Florzinha</option>
        <option value="docinho">Docinho</option>
      </select>
    </div>
  </div>
      <div class="row">
    <div class="col-25">
      <label for="country">Setor</label>
    </div>
    <div class="col-75">
      <select id="setor" name="setor">
        <option value="cozinha">Cozinha</option>
        <option value="quarto">Quarto</option>
        <option value="sala">Sala</option>
      </select>
    </div>
  </div>
  <div class="row">
    <div class="col-25">
      <label for="subject">Observações</label>
    </div>
    <div class="col-75">
      <textarea id="observacoes" name="observacoes" placeholder="Produtos específicos e outros" style="height:200px"></textarea>
    </div>
  </div>
      <br>
  <div class="form-group caixa-pesquisa-div text-center" style="margin-right: 10px;">
      <input type="submit" value="Confirmar">
      <input type="submit" value="Cancelar">
  </div>
      
      <br>
      <br>
      <br>
  </form>
    <br>
<br>
<br>
</div>
-->
<!--
<div class="card mb-3" style="width: 100%">
          <div class="card-header">
            <i class="fas fa-table"></i>
            LISTA DE FUNCIONÁRIOS</div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                  <tr>
                    <th>Status</th>
                    <th>Nome</th>
                    <th>Cargo</th>
                    <th>Prontuário</th>
                    <th>Salário</th>
                    </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>Ativo</td>
                    <td>Kim Woosung</td>
                    <td>Gerente</td>
                    <td>100</td>
                    <td>$320,800</td>
                  </tr>
                  <tr>
                    <td>Ativo</td>
                    <td>Park Dojoon</td>
                    <td>Nutricionista</td>
                    <td>200</td>
                    <td>$120,800</td>
                  </tr>
                  <tr>
                    <td>Inativo</td>
                    <td>Kim Minseok</td>
                    <td>Educador Físico</td>
                    <td>300</td>
                    <td>$20,800</td>
                  </tr>
                  
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
          <br>
<br>
<br>
<br>
<br>
        </div>
 
-->

<!-- FICHA DO FUNCIONARIO E POP UPS DE EDIÇÃO
<div class="container">
    <center><h2>FICHA DO FUNCIONÁRIO</h2></center> 
    <br>
  <form action="/action_page.php">
  <div class="row">
        <div class="col-25">
        <label for="nometarefa"><b>Nome Completo: </b></label>
    </div>
    <div class="col-75">
      <label for="nometarefa">Kim Woosung</label>
    </div>
  </div>
  <div class="row">
        <div class="col-25">
        <label for="nometarefa"><b>Status: </b></label>
    </div>
    <div class="col-75">
      <label for="nometarefa">Ativo</label>
         <i class="fas fa-edit"></i>
    </div>
  </div>
  <div class="row">
        <div class="col-25">
        <label for="nometarefa"><b>Prontuário: </b></label>
    </div>
    <div class="col-75">
      <label for="nometarefa">100</label>
    </div>
  </div>
      <div class="row">
        <div class="col-25">
        <label for="nometarefa"><b>CPF: </b></label>
    </div>
    <div class="col-75">
      <label for="nometarefa">125.128.597-19</label>
    </div>
  </div>
      <div class="row">
        <div class="col-25">
        <label for="nometarefa"><b>Data de Nascimento: </b></label>
    </div>
    <div class="col-75">
      <label for="nometarefa">25/02/1993</label>
    </div>
  </div>
      <div class="row">
        <div class="col-25">
        <label for="nometarefa"><b>Salário </b></label>
    </div>
    <div class="col-75">
      <label for="nometarefa">$320,800 </label>
      <i class="fas fa-edit"></i>
    </div>
  </div>
    <div class="row">
        <div class="col-25">
        <label for="nometarefa"><b>Cargo: </b></label>
    </div>
    <div class="col-75">
      <label for="nometarefa">Gerente</label>
    </div>
    </div>
    <div class="row">
        <div class="col-25">
        <label for="nometarefa"><b>Data entrada na Empresa: </b></label>
    </div>
    <div class="col-75">
      <label for="nometarefa">03/08/2017</label>
    </div>
    </div>
    
    <div class="row">
    <div class="col-25">
        <label for="nometarefa"><b>Bônus Salarial: </b></label>
    </div>
    <div class="col-75">
      <label for="nometarefa">$0,00</label>
      <i class="fas fa-edit"></i>
    </div>
    </div>
      
    <div class="row">
    <div class="col-25">
        <label for="nometarefa"><b>Desconto Salarial: </b></label>
    </div>
    <div class="col-75">
      <label for="nometarefa">$0,00</label>
      <i class="fas fa-edit"></i>
    </div>
    </div>
      <br>
      <br>
      <br>
  </form>
    <br>
<br>
<br>
</div>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">EDIÇÃO DE STATUS</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p><form>
Obs: Se você modificar o status, o Salário será zerado.
      <select id="funcionarioresponsavel" name="funcionarioresponsavel">
        <option value="lindinha">Ativo</option>
        <option value="florzinha">Inativo</option>
        
      </select>
    </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
        <button type="button" class="btn btn-primary">Confirmar</button>
      </div> 
    </div>
  </div>
</div>
-->

<div class="container">
    <center><h2>FLUXO DE CAIXA</h2></center>
    <br>
<table class="table table-hover">
  <thead> ENTRADAS
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Valor</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>#1</td>
      <td>Doação</td>
      <td>R$ 15,00</td>
    </tr>
    <tr>
      <td>#2</td>
      <td>Pagamento Mensal - Nome do Paciente</td>
      <td>R$ 350,00</td>
    </tr>
    <tr>
        <td>Total:</td>
        <td colspan="2"> R$345,00</td>

    </tr>
  </tbody>
</table>
<br>
<br>
<br>
<table class="table table-hover">
  <thead> SAÍDAS
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nome</th>
      <th scope="col">Valor</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>#1</td>
      <td>Jalecos</td>
      <td>R$ 50,00</td>
    </tr>
    <tr>
      <td>#2</td>
      <td>Pagamento ÁGUA</td>
      <td>R$ 100,00</td>
    </tr>
    <tr>
        <td>Total:</td>
        <td colspan="2"> R$150,00</td>
    </tr>
  </tbody>
</table>
<br>
<br>
<div class="alert alert-success" role="alert">
  O caixa fechou com R$195,00 a mais de receita!
</div>
<div class="alert alert-danger" role="alert">
  O caixa fechou no vermelho com R$100,00 a mais de gastos!
</div>
<br>
<br>
<br>
</div>
-->