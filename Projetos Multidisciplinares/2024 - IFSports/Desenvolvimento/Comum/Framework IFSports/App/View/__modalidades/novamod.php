<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo $this->getView()->texto; ?></h4>
                <form class="forms-sample" action="/modalidades/criar" method="POST">

                    <div class="form-group">
                      <label for="exampleInputUsername1">Esporte</label>
                            <select class="form-control" id="nome" name="nome">
                              <option></option>
                              <option>Futebol</option>
                              <option>Volei</option>
                            </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Modalidade</label>
                            <select class="form-control" id="tipo" name="tipo">
                              <option></option>
                              <option>Coletivo</option>
                              <option>Individual</option>
                            </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputUsername1">Sexo</label>
                            <select class="form-control" id="genero" name="genero">
                              <option></option>
                              <option>Masculino</option>
                              <option>Feminino</option>
                              <option>Outro</option>
                            </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Quantidade Minima de Jogadores  por Equipes</label>
                        <input type="text" class="form-control" id="quantmin" name="quantmin" placeholder="Defina o numero minimo de participantes da modalidade">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputPassword1">Quantidade Maxima de Jogadores  por Equipes</label>
                        <input type="text" class="form-control" id="quantmax" name="quantmax" placeholder="Defina o numero minimo de participantes da modalidade">
                    </div>

                    <a href="/dashboard/gmodalidades"><button type="submit" class="btn btn-primary mr-2">Criar Modalidade</button></a>
                    <a href="/dashboard/gmodalidades" onclick="confirm();"><button class="btn btn-danger">Cancelar</button></a>

                </form>

        </div>
    </div>
</div>