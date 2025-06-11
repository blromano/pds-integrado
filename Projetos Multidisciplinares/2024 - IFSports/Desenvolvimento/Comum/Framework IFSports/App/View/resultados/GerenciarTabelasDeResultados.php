
<link rel="stylesheet" href="../../resources/css/mod05.css">
<?php
        $action = "";
        if(isset($this->getView()->campus1))
            $action = '/dashboard/modalidades/AtualizarResultadosPorModalidade';
        else
            $action = '/dashboard/modalidades/InserirResultadosPorModalidade';
    ?>
    <br><br>
    <h1>Gerenciar Tabelas de Resultados <?php echo $this->getView()->nomeModalidade->__get('MDE_NOME') . " / " . $this->getView()->nomeEvento->__get('EVO_NOME') ?></h1>
    <br>
    <br>
    <table>
        <thead>
            <tr>
                <th>Colocação</th>
                <th>Câmpus</th>
            </tr>
        </thead>
        <tbody>
        <form action="<?php echo $action; ?>" class="forms-sample" method="POST">
            <tr>
                <td>Primeiro Lugar</td>
                <td>
                    <select id="campus1" name="campus1">
                        <option value="" disabled selected>Selecione um câmpus</option>
                        <?php 
                            if ($this->getView()->listaCampus) { 
                                foreach ($this->getView()->listaCampus as $campus) {
                        ?>
                                    <option value="<?php echo $campus->__get('CAM_ID'); ?>" <?php if(isset($this->getView()->campus1) &&  $campus->__get('CAM_ID')==$this->getView()->campus1) { echo ("selected"); } ?>  value="<?php echo $campus->__get('CAM_ID'); ?>">
                                        <?php echo $campus->__get('CAM_NOME'); ?>
                                    </option>
                        <?php 
                                }
                            } 
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Segundo Lugar</td>
                <td>
                    <select id="campus2" name="campus2">
                        <option value="" disabled selected>Selecione um câmpus</option>
                        <?php 
                            if ($this->getView()->listaCampus) { 
                                foreach ($this->getView()->listaCampus as $campus) {
                        ?>
                                    <option value="<?php echo $campus->__get('CAM_ID'); ?>" <?php if(isset($this->getView()->campus2) &&  $campus->__get('CAM_ID')==$this->getView()->campus2) { echo ("selected"); } ?>  value="<?php echo $campus->__get('CAM_ID'); ?>">
                                        <?php echo $campus->__get('CAM_NOME'); ?>
                                    </option>
                        <?php 
                                }
                            } 
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Terceiro Lugar</td>
                <td>
                    <select id="campus3" name="campus3">
                        <option value="" disabled selected>Selecione um câmpus</option>
                        <?php 
                            if ($this->getView()->listaCampus) { 
                                foreach ($this->getView()->listaCampus as $campus) {
                        ?>
                                    <option value="<?php echo $campus->__get('CAM_ID'); ?>" <?php if(isset($this->getView()->campus3) &&  $campus->__get('CAM_ID')==$this->getView()->campus3) { echo ("selected"); } ?>  value="<?php echo $campus->__get('CAM_ID'); ?>">
                                        <?php echo $campus->__get('CAM_NOME'); ?>
                                    </option>
                        <?php 
                                }
                            } 
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan="2" class="center-align">
                    <input type="hidden" id="EVM_ID" name="EVM_ID" value="<?php if(isset($_GET["EVM_ID"])) { echo $_GET["EVM_ID"]; } ?>">
                    <input type="submit" class="btn btn-primary mr-2" value="Salvar">
                </td>
            </tr>
        </form>
        </tbody>
    </table>