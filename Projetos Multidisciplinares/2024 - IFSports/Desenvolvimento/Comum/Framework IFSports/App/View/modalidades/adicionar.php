<div class="col-md-6 grid-margin stretch-card">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title"><?php echo $this->getView()->texto; ?></h4>
            <form class="forms-sample" action="/dashboard/modalidades/inserir" method="POST">

                <div class="form-group">
                    <label for="modalidades">Modalidades</label>
                    <select class="form-control" name="modalidades" id="modalidades" required>
                        <option value="" disabled selected>Selecione uma modalidade</option>
                        <?php
                        usort($this->getView()->modalidades, function($a, $b) {
                            return strcmp($a->__get('MDE_NOME'), $b->__get('MDE_NOME'));
                        });

                        foreach($this->getView()->modalidades as $modalidade) { ?>
                            <option value="<?php echo $modalidade->__get('MDE_ID'); ?>">
                                <?php echo $modalidade->__get('MDE_NOME') . ' (' . $modalidade->__get('MDE_TIPO') . ' - ' . $modalidade->__get('MDE_GENERO') . ')'; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div><br>

                <div class="form-group">
                    <label for="EVM_QUANTIDADE_MINIMA_JOGADORES">Quantidade Mínima de Jogadores por Equipes</label>
                    <input type="text" class="form-control" id="EVM_QUANTIDADE_MINIMA_JOGADORES" name="EVM_QUANTIDADE_MINIMA_JOGADORES" placeholder="Defina o número mínimo de participantes da modalidade" required>
                </div><br>

                <div class="form-group">
                    <label for="EVM_QUANTIDADE_MAXIMA_JOGADORES">Quantidade Máxima de Jogadores por Equipes</label>
                    <input type="text" class="form-control" id="EVM_QUANTIDADE_MAXIMA_JOGADORES" name="EVM_QUANTIDADE_MAXIMA_JOGADORES" placeholder="Defina o número máximo de participantes da modalidade" required>
                </div><br><br>

                <input type="hidden" name="FK_EVENTOS_EVO_ID" id="FK_EVENTOS_EVO_ID" value="<?php echo $_GET['EVO_ID']; ?>">

                <input type="submit" class="submit" value="Salvar">
                <!-- <button type="submit" class="btn btn-primary mr-2">Criar Modalidade</button> -->
                <a href="/dashboard/modalidades/listar?EVO_ID=<?php echo $_GET['EVO_ID']; ?>" class="btn btn-danger">Cancelar</a>
                

            </form>
        </div>
    </div>
</div>