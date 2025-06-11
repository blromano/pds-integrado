<div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Listagem de secretarios</h4>
                  <form method="POST" action="pesquisar.php">
                          Filtrar Secretários  <input type="text" name="pesquisar" placeholder="Filtrar">
                          <button type="button"><i class="icon-search"></i></button>
                      </form>
                  <p class="card-description">
                    <!--CRIAR BARRA DE PESQUISA-->
                  </p>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>
                            #
                          </th>
                          <th>
                            Secretários
                          </th>
                          <th>
                            Campus
                          </th>
                          <th>
                            Status
                          </th>
                          <th>
                            Ações
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>
                            1
                          </td>
                          <td>
                            Gustavo Schneider
                          </td>
                          
                          <td>
                            SBV
                          </td>
                          <td>
                            Ativo
                          </td>
                          <td>
                          <a href="/dashboard/editarsecretario" ><button type="button" class="btn btn-dark"><i class="mdi mdi-lead-pencil"></i><b> Editar</b></button></a>
                                <button type="button" class="btn btn-danger" onclick="confirmarRestricao();"><i class="mdi mdi-lock-outline"></i><b> Restringir</b></button>
                          </td>
                        </tr>
                        <tr>
                          <td>
                            2
                          </td>
                          <td>
                            Solange
                          </td>
                          
                          <td>
                            SPO
                          </td>
                          <td>
                            Inativo
                          </td>

                          <td>
                          <a href="/dashboard/editarsecretario" ><button type="button" class="btn btn-dark"><i class="mdi mdi-lead-pencil"></i><b> Editar</b></button></a>
                                <button type="button" class="btn btn-danger" onclick="confirmarRestricao();"><i class="mdi mdi-lock-outline"></i><b> Restringir</b></button>
                          </td>
                        </tr>
                        
                      </tbody>
                    </table>
                   
                  </div>
                  <br> 
                  <a href="/dashboard/cadastrarsecretario"><button type="button" class="btn btn-success">Cadastrar Novo</button></a>
                </div>
              </div>
            </div>

            <script>
              

function confirmarRestricao(){
    var confirma =confirm("Tem a certeza que quer eliminar a paragem");
    if (confirma==true){
        window.location.href="/dashboard/restringir";
    } 
}

</script>