<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Editar Modalidade</h4>
            <form class="forms-sample" action="/dashboard/modalidades/alterar" method="POST">
                <input type="hidden" name="EVM_ID" value="<?php echo $this->getView()->modalidade->__get('EVM_ID'); ?>">
                <input type="hidden" name="FK_EVENTOS_EVO_ID" value="<?php echo $_GET['EVO_ID']; ?>">
                <div class="form-group">
                    <label for="modalidades">Modalidades</label>
                    <select class="form-control" name="modalidades" id="modalidades" required>
                        <option value="" disabled>Selecione uma modalidade</option>
                        <?php foreach($this->getView()->modalidades as $modalidade) { ?>
                            <option value="<?php echo $modalidade->__get('MDE_ID'); ?>" <?php echo ($modalidade->__get('MDE_ID') == $this->getView()->modalidade->__get('FK_MODALIDADES_MDE_ID')) ? 'selected' : ''; ?>>
                                <?php echo $modalidade->__get('MDE_NOME'); ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>

                <div class="form-group">
                    <label for="EVM_QUANTIDADE_MINIMA_JOGADORES">Quantidade Mínima de Jogadores</label>
                    <input type="text" class="form-control" id="EVM_QUANTIDADE_MINIMA_JOGADORES" name="EVM_QUANTIDADE_MINIMA_JOGADORES" value="<?php echo $this->getView()->modalidade->__get('MDE_QUANTIDADE_MINIMA_JOGADORES'); ?>" required>
                </div>

                <div class="form-group">
                    <label for="EVM_QUANTIDADE_MAXIMA_JOGADORES">Quantidade Máxima de Jogadores</label>
                    <input type="text" class="form-control" id="EVM_QUANTIDADE_MAXIMA_JOGADORES" name="EVM_QUANTIDADE_MAXIMA_JOGADORES" value="<?php echo $this->getView()->modalidade->__get('MDE_QUANTIDADE_MAXIMA_JOGADORES'); ?>" required>
                </div>

                <button type="submit" class="btn btn-primary">Editar Modalidade</button>
                <a href="/dashboard/modalidades/listar?EVO_ID=<?php echo $_GET['EVO_ID']; ?>" class="btn btn-danger">Cancelar</a>
            </form>
        </div>
    </div>
</div>