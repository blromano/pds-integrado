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
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Nome do Funcionário </label>
                            <input type="text" class="form-control" placeholder="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Código </label>
                            <input type="number" class="form-control" placeholder=" ">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label> Responsável Setor </label>
                            <input list="tipo-residuo" class="form-control" placeholder=" ">
                        </div>
                        <button type="submit" class="botao_enviar">Salvar</button> <button type="submit" class="bnt">Cancelar</button>
                    </div>
                </div>
                </div>
                </div> 
            </form>
        </div>
    </div>
</div>
</div>