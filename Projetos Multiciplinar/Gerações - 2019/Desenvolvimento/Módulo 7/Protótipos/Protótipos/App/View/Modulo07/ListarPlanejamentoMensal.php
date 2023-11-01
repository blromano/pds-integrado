<section id="md7" class="container-fluid">

<div class="text-center">
 
        <img src="../../../img/atividade_recreativa.jpg" class="rounded"  height="200px" width="320px"/>
        </div>
         <div class="row d-flex">
            <div class="col-md-10">
        <nav class="navbar navbar-light ">
  <form class="form-inline">
    <div class="form-row">       
       <div class="form-group2 col-md-3">
     
    </div>
    <div class="form-group col-md-6">
      <label for="inputState" text-align="center" >Selecione o Ano:</label>
      <select id="inputState" class="form-control">
          <option>2019</option>
        <option>2020</option>
        <option>2021</option>
        <option>2022</option>
      </select>
    </div>

  </div>
    <div class="form-row">       
       <div class="form-group2 col-md-3">
     
    </div>
    <div class="form-group col-md-6">
      <label for="inputState" text-align="center" >Selecione o Mes:</label>
      <select id="inputState" class="form-control">
          <option>Janeiro</option>
        <option>Fevereiro</option>

        <option>Março</option>

        <option>Abril</option>
      </select>
    </div>

  </div>
   
  </form>

            <div class="col-md-2">
        <nav class="navbar navbar-light ">
  <form class="form-inline">
    <button class="btn btn-success my-2 my-sm-0" type="submit">Adicionar</button>
  </form>
        </nav>
</div>
            <div class="col-md-2">
        <nav class="navbar navbar-light ">
  <form class="form-inline">
    <a class="btn btn-outline-dark" href="/md7/AlterarPlanoMensal">Alterar</a>
  </form>
        </nav>
</div>
        <div class="col-md-2">
        <nav class="navbar navbar-light ">
  <form class="form-inline">
    <button type="button" class="btn btn-outline-danger" align="center" onclick="displayMessage();" value="alert">Excluir </button>
  </form>
        </nav>
</div>     
            </div>
        <div class="card-body">
            <div class="table-responsive">
              <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
        
    <tr>
     
      <th style="width: 25%">Data</th>
      <th style="width: 25%">Horario</th>
      <th style="width: 25%">Atividade Recreativa</th>
      <th style="width: 20%"></th>
      
    </tr>
     
     
      
    
  </thead>
  <tbody>
    <tr>
      
      <td>11/01</td>
      <td>15:00</td>
      <td>Atividade Recreativa 1</td>
      <td><button class="btn btn-info my-2 my-sm-0" type="submit">Visualizar</button></td>
    </tr>
    <tr>
     
      <td>18/01</td>
      <td>09:00</td>
      <td>Atividade Recreativa 3</td>
      <td><button class="btn btn-info my-2 my-sm-0" type="submit">Visualizar</button></td>
    </tr>
    <tr>
      <td>25/01</td>
      <td>18:00</td>
      <td>Atividade Recreativa 2</td>
      <td><button class="btn btn-info my-2 my-sm-0" type="submit">Visualizar</button></td>
    </tr>
  </tbody>
</table>
            </div>
        </div>
        </form>
		 <script src="../../../js/ExcluirModulo07.js" type="text/javascript"></script>
</section>