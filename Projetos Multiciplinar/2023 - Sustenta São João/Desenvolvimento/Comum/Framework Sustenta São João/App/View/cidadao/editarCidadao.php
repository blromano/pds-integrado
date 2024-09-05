<div class="card">
    <div class="card-header">
        <h5 class="title"><?php echo $this->getView()->title; ?></h5>
    </div>
    <div class="card-body">
        <form action="/dashboard/alterarCidadao" class="form_j" method="POST">
            <?php if($_SESSION['id'] == $this->getView()->cidadao->__get('USU_ID')) { ?>
            <div class="row">
                <div class="col-md-2">
                    <div class="form-group">
                        <label for="id">ID</label>
                        <input type="number" readonly name="USU_ID" class="form-control text_j" value="<?php echo $this->getView()->cidadao->__get('USU_ID'); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nome">CELULAR</label>
                        <input type="text" name="USU_CELULAR" class="form-control text_j" value="<?php echo $this->getView()->cidadao->__get('USU_CELULAR'); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nome">E-MAIL</label>
                        <input type="text" name="USU_EMAIL" class="form-control text_j" value="<?php echo $this->getView()->cidadao->__get('USU_EMAIL'); ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tipo" class="col-form-label">CEP</label>
                        <input name="USU_CEP" id="USU_CEP" class="form-control text_j" value="<?php echo $this->getView()->cidadao->__get('USU_CEP'); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tipo" class="col-form-label">RUA</label>
                        <input name="USU_RUA" id="USU_RUA" class="form-control text_j" value="<?php echo $this->getView()->cidadao->__get('USU_RUA'); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tipo" class="col-form-label">NÚMERO</label>
                        <input name="USU_NUMERO_RESIDENCIA" id="USU_NUMERO_RESIDENCIA" class="form-control text_j" value="<?php echo $this->getView()->cidadao->__get('USU_NUMERO_RESIDENCIA'); ?>">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tipo" class="col-form-label">BAIRRO</label>
                        <input name="USU_BAIRRO" id="USU_BAIRRO" class="form-control text_j" value="<?php echo $this->getView()->cidadao->__get('USU_BAIRRO'); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tipo" class="col-form-label">CIDADE</label>
                        <input name="USU_CIDADE" id="USU_CIDADE" class="form-control text_j" value="<?php echo $this->getView()->cidadao->__get('USU_CIDADE'); ?>">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="tipo" class="col-form-label">ESTADO</label>
                        <input name="USU_ESTADO" id="USU_ESTADO" class="form-control text_j" value="<?php echo $this->getView()->cidadao->__get('USU_ESTADO'); ?>">
                        <input type="hidden" name="USU_ID" id="USU_ID" class="form-control text_j" value="<?php echo $this->getView()->cidadao->__get('USU_ID'); ?>">
                    </div>
                </div>
            </div>
            <?php } else {die();}?>
            <div class="row justify-content-end alinhar">
                <div>
                    <a class="a_j" href="/dashboard"><button type="button" class="btn btn-danger btn-sm"><i class="bi bi-backspace"></i> Cancelar</button></a>
                    <button type="submit" class="btn btn-success btn-sm"><i class="bi bi-save"></i> Salvar</button>
                </div>
            </div>
        </form>
    </div>
</div>