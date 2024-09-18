<?php
include_once '../../dao/ConectarBD.php';
include_once '../../dao/MedicaoDAO.php';
include_once '../../dao/SensoresInstaladosSensores.php';
include_once '../../modelo/Medicao.php';

session_start();

if (isset($_GET['id_pcd'])) {
    $_SESSION['idPcd'] = $_GET['id_pcd'];
    //$_SESSION['senId'] = SensoresInstaladosSensores::BuscarSensoresInstaladosSensores($_SESSION['idPcd']);
    unset($_SESSION['dataInicial']);
    unset($_SESSION['dataFinal']);

    header("location: MedicoesPcd.php");
}

if (isset($_POST['operacao'])) {

    if ($_POST['operacao'] == "inserir") {

        $data = ConverterDataBR_EUA($_POST['data_hora']);

        MedicaoDAO::Criar(new Medicao(0, $data, $_POST['dado'], $_POST['tipo_medicao']));
    } else if ($_POST['operacao'] == "atualizar") {

        $data = ConverterDataBR_EUA($_POST['data_hora']);

        MedicaoDAO::Atualizar(new Medicao($_POST['id-medicao'], $data, $_POST['dado'], $_POST['tipo-sensor']));
        
    } else if ($_POST['operacao'] == "excluir") {

        MedicaoDAO::Excluir(new Medicao($_POST['id']));
        
    } else if ($_POST['operacao'] == "buscar-medicao") {

        $data = MedicaoDAO::BuscarMedicao($_POST['id']);

        $data['id-medicao'] = $_POST['id'];

        $idSensorSelecionado = $data['sis'];

        $data['medicao'] = MedicaoDAO::TipoMedicao($data['sis']);

        $data['sensor'] = MedicaoDAO::TipoSensores($idSensorSelecionado);

        $data['sis-id'] = $_POST['sis-id'];

        GerarFormularioAtualizar($data);

        exit();
    }

    header("location: MedicoesPcd.php");
}

if (isset($_POST['tipo-sensor'])) {
    GerarTipoSensor($_POST['id-medicao']);
}

function GerarTipoSensor($idSis) {

    $datas = MedicaoDAO::TipoSensores($idSis);
    
    ?>
        <input name="tipo-sensor" type="hidden" value="<?php echo $datas[3] ?>" />
        <?php echo $datas[0] ?>
    <?php
    
}

function ExibirValorFormularioData($campo = 'dataInicial') {
    if ($campo == 'dataInicial') {
        return isset($_SESSION['dataInicial']) ? $_SESSION['dataInicial'] : '';
    } else if ($campo == 'dataFinal') {
        return isset($_SESSION['dataFinal']) ? $_SESSION['dataFinal'] : '';
    } else if ($campo == 'idPcd') {
        return isset($_SESSION['idPcd']) ? $_SESSION['idPcd'] : $_GET['id_pcd'];
    }
}

if (isset($_POST["gerarTabela"])) {
    $_SESSION['dataInicial'] = $_POST['dataInicial'];
    $_SESSION['dataFinal'] = $_POST['dataFinal'];
    $_SESSION['idPcd'] = $_POST['idPcd'];

    header("location: MedicoesPcd.php");
}

function ConverterDataBR_EUA($data) {
    //$data[0] = dia , $data[1] = mes , $data[2] = ano
    $data = explode(" ", $data);
    $dataAnual = explode("-", $data[0]);

    //Verificar se contem hora na $data
    if (count($data) > 1) {
        // Adiciona ao final da string a hora
        return $dataAnual[2] . '-' . $dataAnual[1] . '-' . $dataAnual[0] . " " . $data[1];
    }
    //Criar a string com a data
    return $dataAnual[2] . '-' . $dataAnual[1] . '-' . $dataAnual[0];
}

function ConverterDataEUA_BR($data) {
    //$data[0] = ano , $data[1] = mes , $data[2] = dia
    $data = explode(" ", $data);
    $dataAnual = explode("-", $data[0]);

    //Verificar se contem hora na $data
    if (count($data) > 1) {
        // Adiciona ao final da string a hora
        return $dataAnual[2] . '-' . $dataAnual[1] . '-' . $dataAnual[0] . " " . $data[1];
    }
    //Criar a string com a data
    return $dataAnual[2] . '-' . $dataAnual[1] . '-' . $dataAnual[0];
}

function GerarTabela() {

    if (isset($_SESSION['idPcd']) && isset($_SESSION['dataInicial']) && isset($_SESSION['dataFinal'])) {

        foreach (MedicaoDAO::ProcurarPorDATA(ConverterDataBR_EUA($_SESSION['dataInicial']), ConverterDataBR_EUA($_SESSION['dataFinal']), $_SESSION['idPcd']) as $value):
            ?>
            <tr>
                <td><?php echo $value["data_hora"] ?></td>
                <td><?php echo $value["nome"] ?></td>
                <td><?php echo $value["sensor"] ?></td>
                <td><?php echo $value["dado"] ?></td>
                <td><?php echo $value["umedida"] ?></td>
                <td><button class="btn btn-primary btn-table"  data-toggle="modal" data-target="#modal-edit" sis="<?php echo $value['sis_id'] ?>" operacao="atualizar" medicao= "<?php echo $value['MED_ID'] ?>">Editar</button></td>
                <td><button class = "btn btn-primary btn-table " data-toggle = "modal" data-target = "#modal-del" operacao="excluir" medicao= "<?php echo $value['MED_ID'] ?>">Excluir</button></td>
            </tr>
            <?php
        endforeach;
    }
}

function GerarFormularioAtualizar($data) {
    ?>

    <form action="MedicoesCTR.php" method="POST" id="formAM">
        <div class="form-group">
            <label>Data e Hora</label>
            <input type="text" class="form-control input"  id="data-alteracao" name="data_hora" value="<?php echo ConverterDataEUA_BR($data['data_hora']) ?>" required>
        </div>

        <div class="form-group">
            <label>Medição</label>
            <input type="text" class="form-control input" name="dado" value="<?php echo $data['dado'] ?>" required>
        </div>

        <div class="form-group">
            <label>Tipo de Medição</label>
            <select class="form-control" name="tipo_medicao" id="lista-medicoesalt" >
                <?php
                $tiposMedicoes = MedicaoDAO::TipoMedicao($_SESSION['idPcd']);


                foreach ($tiposMedicoes as $tipoMedicao):
                    ?>
                    <option value="<?php echo $tipoMedicao[2] ?>"><?php echo $tipoMedicao[0] ?> </option>
                    <?php
                endforeach;
                ?>
            </select>
        </div>

        <div class="form-group " id="lista-sensoresalt">
            <label>Tipo de Sensor</label>
            <div id="sensoresalt">
                <?php
                GerarTipoSensor($data['sensor'][1]);
                ?>
            </div>
        </div>

        <div class="modal-footer">
            <button type="submit" class="btn btn-default" id="submit-edit">Alterar</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
        </div>

        <input type="hidden" name="id-medicao" value="<?php echo $data['id-medicao'] ?>">

        <input type="hidden" name="operacao" value="atualizar">

    </form>

    <script type="text/javascript">
        $("#data-alteracao").mask("99-99-9999 99:99:99");
        $('#formAM').formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            fields: {
                dado: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo deve ser preenchido'
                        },
                        numeric: {
                            message: 'O dado deve ser numérico'
                        }
                    }
                },
                data_hora: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo deve ser preenchido'
                        },
                        date: {
                            format: 'DD-MM-YYYY hh:mm:ss',
                            message: 'Inserção inválida'
                        }
                    }
                },
                tipo_medicao: {
                    validators: {
                        notEmpty: {
                            message: 'Este campo deve ser preenchido'
                        }
                    }
                }
            }
        });
    </script>

    <?php
}
