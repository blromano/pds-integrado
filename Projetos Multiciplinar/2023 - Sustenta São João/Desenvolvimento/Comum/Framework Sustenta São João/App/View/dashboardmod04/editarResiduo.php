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
            <form action="/alterarResiduo" class="form_j" method="POST">
                <div class="form-row align-items-center">
                    <div class="form-group col-md-1">
                        <label for="id">ID</label>
                    </div>
                    <div class="form-group col-md-1">
                        <input type="number" class="form-control text_j" value="1">
                    </div>
                    <div class="form-group col-md-1">
                        <label for="nome">Nome</label>
                    </div>
                    <div class="form-group col-md-9">
                        <input type="text" class="form-control text_j" placeholder="Nome do resíduo" value="Metal">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label for="tipo" class="col-sm-1 col-form-label">Tipo</label>
                    <div class="col-sm-11">
                        <input list="tipo-residuo" class="form-control text_j" placeholder="Tipo do resíduo" value="Resíduo Sólido Urbano">
                        <datalist id="tipo-residuo">
                            <option value="Resíduos Industriais">Lodos gerados por sistemas de tratamento de efluentes líquidos,...</option>
                            <option value="Resíduos Hospitalares">Provenientes de atividades ligadas ao tratamento de saúde,...</option>
                            <option value="Resíduos Sólidos Urbanos">Metais, isopor, espumas,...</option>
                            <option value="Resíduos de Construção Civil">Tijolos, blocos, telhas, argamassa, concreto, placas de revestimento,...</option>
                            <option value="Resíduos Nucleares">Rejeitos radioativos ou contaminados com radionuclídeos,...</option>
                        </datalist>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col-3">
                        <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Cancelar</button>
                        <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Salvar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>