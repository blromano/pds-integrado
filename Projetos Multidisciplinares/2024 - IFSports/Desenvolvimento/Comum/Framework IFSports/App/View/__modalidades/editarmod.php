<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Editar Modalidade</h4>
                <form class="forms-sample">

                    <div class="form-group">
                      <label for="exampleInputUsername1">Esporte</label>
                            <select class="form-control">
                              <option>Futebol</option>
                              <option>Volei</option>
                              <option>Basquete</option>
                            </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Modalidade</label>
                            <select class="form-control">
                              <option>Coletivo</option>
                              <option>Individual</option>
                            </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Sexo</label>
                            <select class="form-control">
                              <option>Masculino</option>
                              <option>Feminino</option>
                              <option>Outro</option>
                            </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Quantidade Minima de Jogadores por Equipes</label>
                        <input type="email" class="form-control" id="exampleInputEmail1" placeholder="22">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Quantidade Maxima de Jogadores por Equipes</label>
                        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="46">
                    </div>

                    <a href="/dashboard/gmodalidades"><button type="button" class="btn btn-primary mr-2">Salvar</button></a>
                    <a href="/dashboard/gmodalidades" onclick="confirm();"><button type="button" class="btn btn-danger">Cancelar</button></a>

                </form>

        </div>
    </div>
</div>