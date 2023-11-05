<?php

include 'Database.php';

class PCDDAO {   

    public function listarPCD() {
        try {

            $db = Database::CriarConexao();

            $query = "SELECT * FROM pcds";

            $stmt = $db->prepare($query);
            $stmt->execute();
            $num_linhas = $stmt->rowCount();
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);


            if ($num_linhas >= 1) {

                foreach ($conteudos as $conteudo) {

                    echo'<tr>';
                    echo'<td><input type="checkbox" id="check"></td>';
                    echo'<td>' . $conteudo['PCD_ID'] . '</td>';
                    echo'<td>' . $conteudo['PCD_CIDADE'] . '</td>';
                    echo'<td>' . $conteudo['PCD_ESTADO'] . '</td>';
                    echo'<td>' . $conteudo['PCD_LATITUDE'] . '</td>';
                    echo'<td>' . $conteudo['PCD_LONGITUDE'] . '</td>';
                    echo'<td>'
                    . '<a href="DadosHistoricosPCD.php?id=' . $conteudo['PCD_ID'] . '" class="btn btn-primary btn-table">Visualizar Dados</a>'
                    . '</td>';
                    echo'</tr>';
                }
            } else {
                printf("Não há nenhuma PCD resgistrado na Base de Dados!");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function PCDTabela($idpcd) {
        try {

            $db = Database::CriarConexao();

            $query = "SELECT * FROM pcds WHERE pcds.PCD_ID = " . $idpcd;

            $stmt = $db->prepare($query);
            $stmt->execute();
            $num_linhas = $stmt->rowCount();
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);


            if ($num_linhas >= 1) {

                foreach ($conteudos as $conteudo) {

                    echo'<tr>';
                    echo'<td>' . $conteudo['PCD_ID'] . '</td>';
                    echo'<td>' . $conteudo['PCD_CIDADE'] . '</td>';
                    echo'<td>' . $conteudo['PCD_ESTADO'] . '</td>';
                    echo'<td>' . $conteudo['PCD_LATITUDE'] . '</td>';
                    echo'<td>' . $conteudo['PCD_LONGITUDE'] . '</td>';
                    echo '<td><button type="button" data-toggle="modal" data-target="#modalSensores" class="btn btn-default btn-table">Sensores</button></td> ';
                    echo'</tr>';
                }
            } else {
                printf("Não há nenhuma PCD resgistrado na Base de Dados!");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function filtrarDadosPCD($idpcd, $dataIncial, $dataFinal) {
        try {
            $dataIncial = date($dataInicial);
            $dataFinal = date($dataFinal);
            $db = Database::CriarConexao();

            $query = " SELECT medicoes.MED_DATA_HORA_MEDICAO, medicoes.MED_DADO, tipos_sensores.TSE_DESCRICAO, tipos_sensores.TSE_TIPO_SENSOR, tipos_sensores.TSE_UNIDADE_MEDIDA,tipos_medicoes.TIM_NOME 
            FROM sensores_instalados_sensores
            INNER JOIN medicoes on medicoes.SEN_ID = sensores_instalados_sensores.SEN_ID
            INNER JOIN tipos_sensores on tipos_sensores.TSE_ID = sensores_instalados_sensores.TSE_ID
            INNER JOIN tipos_medicoes on tipos_medicoes.TIM_ID = tipos_sensores.TIM_ID
            WHERE sensores_instalados_sensores.PCD_ID = " . $idpcd . "AND WHERE medicoes.MED_DATA_HORA_MEDICAO BETWEEN ";

            $stmt = $db->prepare($query);
            $stmt->execute();
            $num_linhas = $stmt->rowCount();
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($num_linhas >= 1) {

                foreach ($conteudos as $conteudo) {
                    $dataMedicao = date_create($conteudo['MED_DATA_HORA_MEDICAO']);
                    $diaMedicao = date_format($dataMedicao, "d/m/Y");
                    $horaMedicao = date_format($dataMedicao, "H:i");

                    echo'<tr>';
                    echo'<td>' . $diaMedicao . '</td>';
                    echo'<td>' . $horaMedicao . '</td>';
                    echo'<td>' . $conteudo['TIM_NOME'] . '</td>';
                    echo'<td>' . $conteudo['TSE_TIPO_SENSOR'] . '</td>';
                    echo'<td>' . $conteudo['MED_DADO'] . $conteudo['TSE_UNIDADE_MEDIDA'] . '</td>';
                    echo'</tr>';
                }
            } else {
                printf("Não há nenhum Dado resgistrado na Base de Dados!");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function listarDadosPCD($idpcd, $dataInicial, $dataFinal) {
        try {


            // $dataInicial = date_format($dataInicial, "Y-m-d");

            $db = Database::CriarConexao();
            if (empty($dataInicial)) {
                $query = " SELECT medicoes.MED_DATA_HORA_MEDICAO AS PERIODO, medicoes.MED_DADO AS DADO, tipos_sensores.TSE_DESCRICAO, tipos_sensores.TSE_TIPO_SENSOR, tipos_sensores.TSE_UNIDADE_MEDIDA,tipos_medicoes.TIM_NOME 
                FROM sensores_instalados_sensores
                INNER JOIN medicoes on medicoes.SEN_ID = sensores_instalados_sensores.SEN_ID
                INNER JOIN tipos_sensores on tipos_sensores.TSE_ID = sensores_instalados_sensores.TSE_ID
                INNER JOIN tipos_medicoes on tipos_medicoes.TIM_ID = tipos_sensores.TIM_ID
                WHERE sensores_instalados_sensores.PCD_ID = " . $idpcd . " ORDER BY PERIODO;";
            } else {



                $dataInicial = DateTime::createFromFormat('d/m/Y', $dataInicial);
                $dataInicial = $dataInicial->modify('-1 day');
                $dataInicial = $dataInicial->format('Y-m-d H:i:s');
                $dataFinal = DateTime::createFromFormat('d/m/Y', $dataFinal);
                //$dataFinal = $dataFinal->modify('+1 day');
                $dataFinal = $dataFinal->format('Y-m-d H:i:s');
//
//                $date1 = new DateTime($dataFinal);
//                $date2 = new DateTime($dataInicial);
//
//                $valor = $date1->diff($date2);
//
//                if (($valor->d) <= 7) {

                $query = "SELECT medicoes.MED_DATA_HORA_MEDICAO AS PERIODO, medicoes.MED_DADO AS DADO, tipos_sensores.TSE_DESCRICAO, tipos_sensores.TSE_TIPO_SENSOR, tipos_sensores.TSE_UNIDADE_MEDIDA,tipos_medicoes.TIM_NOME 
                FROM sensores_instalados_sensores
                INNER JOIN medicoes on medicoes.SEN_ID = sensores_instalados_sensores.SEN_ID
                INNER JOIN tipos_sensores on tipos_sensores.TSE_ID = sensores_instalados_sensores.TSE_ID
                INNER JOIN tipos_medicoes on tipos_medicoes.TIM_ID = tipos_sensores.TIM_ID
                WHERE sensores_instalados_sensores.PCD_ID = " . $idpcd . " AND medicoes.MED_DATA_HORA_MEDICAO BETWEEN '" . $dataInicial . "' AND '" . $dataFinal . "' ORDER BY PERIODO";
//                } else {
//
//                    if ((($valor->d) > 7) && (($valor->d) <= 30)) {
//
//                        $query = "SELECT medicoes.MED_DATA_HORA_MEDICAO AS PERIODO, AVG(medicoes.MED_DADO) AS DADO, tipos_sensores.TSE_DESCRICAO, tipos_sensores.TSE_TIPO_SENSOR, tipos_sensores.TSE_UNIDADE_MEDIDA
//                FROM sensores_instalados_sensores
//                INNER JOIN medicoes on medicoes.SEN_ID = sensores_instalados_sensores.SEN_ID
//                INNER JOIN tipos_sensores on tipos_sensores.TSE_ID = sensores_instalados_sensores.TSE_ID
//                WHERE sensores_instalados_sensores.PCD_ID = " . $idpcd . " AND medicoes.MED_DATA_HORA_MEDICAO BETWEEN '" . $dataInicial . "' AND '" . $dataFinal . "' ORDER BY PERIODO";
//                    }
//                }
            }

            $stmt = $db->prepare($query);
            $stmt->execute();
            $num_linhas = $stmt->rowCount();
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($num_linhas >= 1) {

                foreach ($conteudos as $conteudo) {
                    $dataMedicao = date_create($conteudo['PERIODO']);
                    $diaMedicao = date_format($dataMedicao, "d/m/Y");
                    $horaMedicao = date_format($dataMedicao, "H:i");

                    echo'<tr>';
                    echo'<td>' . $diaMedicao . '</td>';
                    echo'<td>' . $horaMedicao . '</td>';
                    echo'<td>' . $conteudo['TIM_NOME'] . '</td>';
                    echo'<td>' . $conteudo['TSE_TIPO_SENSOR'] . '</td>';
                    echo'<td>' . $conteudo['DADO'] . $conteudo['TSE_UNIDADE_MEDIDA'] . '</td>';
                    echo'</tr>';
                }
            } else {
//printf("Não há nenhum Dado resgistrado na Base de Dados!");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function listarData($idpcd) {
        try {

            $db = Database::CriarConexao();

            $query = "SELECT DISTINCT(DATE(medicoes.MED_DATA_HORA_MEDICAO)) AS PERIODO FROM medicoes,pcds,sensores_instalados_sensores WHERE pcds.PCD_ID = " . $idpcd . " AND sensores_instalados_sensores.PCD_ID = " . $idpcd . " ORDER BY PERIODO;";

            $stmt = $db->prepare($query);
            $stmt->execute();
            $num_linhas = $stmt->rowCount();
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);


            if ($num_linhas >= 1) {

                foreach ($conteudos as $conteudo) {

                    $dataMedicao = date_create($conteudo['PERIODO']);
                    $diaMedicao = date_format($dataMedicao, "d/m/Y");
                    echo'<option>' . $diaMedicao . '</option>';
                }
            } else {
                printf("Não há nenhuma PCD resgistrado na Base de Dados!");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function listarSensoresPCD($idpcd) {
        try {

            $db = Database::CriarConexao();
            $query = "SELECT tipos_sensores.TSE_TIPO_SENSOR, tipos_sensores.TSE_DESCRICAO FROM tipos_sensores INNER JOIN sensores_instalados_sensores ON tipos_sensores.TSE_ID = sensores_instalados_sensores.TSE_ID WHERE sensores_instalados_sensores.PCD_ID = :idPCD";
            $stmt = $db->prepare($query);
            $stmt->bindValue(":idPCD", $idpcd, PDO::PARAM_INT);
            $stmt->execute();
            $num_linhas = $stmt->rowCount();
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($num_linhas >= 1) {
                echo '<ul class="list-group">';

                foreach ($conteudos as $conteudo) {

                    echo'<li class="list-group-item"> <label>' . $conteudo['TSE_TIPO_SENSOR'] . '</label><br><label>Unidade de Medida:</label> ' . $conteudo['TSE_DESCRICAO'] . '</li>';
                }
            }
            echo '</ul>';
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }    

}
