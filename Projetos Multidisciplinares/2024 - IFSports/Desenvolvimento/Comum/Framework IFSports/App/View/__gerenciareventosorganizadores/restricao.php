<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Restrições do Evento [Nome do Evento]</h4>
                <form class="forms-sample">

                    <div class="form-group">
                      <label for="idade">Idade Minima</label>
                        <input type="number" class="form-control" id="idade">
                    </div>

                    <div class="form-group">
                      <label for="idade">Idade Maxima</label>
                        <input type="number" class="form-control" id="idade">
                    </div>

                    <div class="form-group">
                      <label for="exampleSelectGender">Genero</label> <br>
                        <div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input"><i class="input-helper">Feminino</i></label></div>
                        <div class="form-check"><label class="form-check-label"><input type="checkbox" class="form-check-input"><i class="input-helper">Masculino</i></label></div>
                      </div>

                    <div class="form-group">
                      <label for="modind">Quantidade Minima de Incrições em Modalidades Individuais</label>
                        <input type="number" class="form-control" id="modind">
                    </div>

                    <div class="form-group">
                      <label for="modind">Quantidade Maxima de Incrições em Modalidades Individuais</label>
                        <input type="number" class="form-control" id="modind">
                    </div>

                    <div class="form-group">
                      <label for="modind">Quantidade Minima de Incrições em Modalidades Coletivas</label>
                        <input type="number" class="form-control" id="modind">
                    </div>

                    <div class="form-group">
                      <label for="modind">Quantidade Maxima de Incrições em Modalidades Coletivas</label>
                        <input type="number" class="form-control" id="modind">
                    </div>

                    <div class="form-group">
                      <label for="exampleTextarea1">Restrições Especificas</label>
                      <textarea class="form-control" id="exampleTextarea1" rows="4"></textarea>
                    </div>

                    <a href="/dashboard/listareventos"><button type="button" class="btn btn-primary mr-2">Salvar</button></a>
                    <a href="/dashboard/listareventos" onclick="confirm();"><button type="button" class="btn btn-danger">Cancelar</button></a>

                </form>
        </div>
    </div>
</div>
