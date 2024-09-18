<div class="row">
    <div id="cadastro" class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header text-center">
                <span><h3><?php echo $this->getView()->title; ?><h3></span>
            </div>
            <div class="card-body">
                <form action="/ouvidoria/inserir" method="post"  >                             

                    <label for="username">Recado</label>
                    <div class="form-group">
                         <textarea class="form-control" class="form-control form-control-user" id="OUV_RECADO"  name="OUV_RECADO"   autocomplete="off" placeholder="Área de recado" required></textarea>
                    </div>
                    <label for="username">Motivo</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="OUV_MOTIVO"  name="OUV_MOTIVO"    autocomplete="off" placeholder="Motivo" required>
                    </div>
                    <label for="username">Identificação</label>
                    <div class="form-group">
                        <input type="text" class="form-control form-control-user" id="FK_USUARIOS_USU_ID"  name="FK_USUARIOS_USU_ID"    autocomplete="off" placeholder="Identificação do usuario" required>
                    </div>
                    <div class="posbotao"> 
                    <br>
                        <button class="btn btn-primary " type="submit">Salvar</button>
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


