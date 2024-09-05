<div class="container">
    <div class="card">
        <div class="card-header">
            <div class="row justify-content-between">
                <div class="col">
                    <h5 class="title"><?php echo $this->getView()->title; ?></h5>
                </div>
            </div>
        </div>
        <div class="card-body">
            <form class="form_j">
                <div class="form-row">
                    <div class="form-group col-md-1">
                        <label for="id">ID</label>
                        <input type="number" class="form-control text_j" placeholder="ID" value="1">
                    </div>
                    <div class="form-group col-md-11">
                        <label for="nome">Nome</label>
                        <input type="text" class="form-control text_j" placeholder="Nome do resíduo" value="Metal">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="tipo">Tipo</label>
                        <input list="tipo-residuo" class="form-control text_j" placeholder="Tipo do resíduo" value="Resíduo Sólido Urbano">
                        <datalist id="tipo-residuo">
                            <option value="Resíduos Industriais">Lodos gerados por sistemas de tratamento de efluentes líquidos,...</option>
                            <option value="Resíduos Hospitalares">Provenientes de atividades ligadas ao tratamento de saúde,...</option>
                            <option value="Resíduos Sólidos Urbanos">Metais, isopor, espumas,...</option>
                            <option value="Resíduos de Construção Civil">Tijolos, blocos, telhas, argamassa, concreto, placas de revestimento,...</option>
                            <option value="Resíduos Nucleares">Rejeitos radioativos ou contaminados com radionuclídeos,...</option>
                        </datalist>
                    </div>
                    <div class="form-group col-md-3">
                        <label for="quantidade">Quantidade</label>
                        <input type="number" class="form-control text_j" value="24">
                    </div>
                    <div class="form-group col-md-3">
                        <label for="data">Data</label>
                        <input type="date" class="form-control text_j" value="05/07/04">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="ponto_de_coleta">Ponto de Coleta</label>
                        <input type="text" class="form-control text_j" value="Ginasinho">
                    </div>
                </div>
                <div class="form-row justify-content-end">
                    <div class="col-3">
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Cancelar</button>
                        <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>