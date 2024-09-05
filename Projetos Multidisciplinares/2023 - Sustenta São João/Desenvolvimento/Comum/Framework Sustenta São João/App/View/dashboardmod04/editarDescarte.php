<div class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h5 class="title"><?php echo $this->getView()->title; ?></h5>
              </div>
              <div class="card-body">
                <form>
                  <div class="row">
                    
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Nome do ponto de coleta</label>
                        <input type="text" class="form-control" placeholder="Digite aqui" value="Vila Brasil">
                      </div>
                    </div>
                    <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Período em que foi realizado o descarte</label>
                        <input type="date" class="form-control" value="15/06/2023">
                        <input type="time" class="form-control" value="16:27">
                      </div>
                    </div>
                  </div>
                  <div class="col-md-3 px-1">
                      <div class="form-group">
                        <label>Tipo de resíduo</label>
                        <input type="text" class="form-control" placeholder="Digite aqui" value="Vidro">
                      </div>
                    </div>
                    <button type="submit" class="botao_enviar">Salvar</button> <button type="submit" class="bnt">Cancelar</button>
                </form>
                </div>
                
                
              </div>
            </div>
          </div>
          
      </div>