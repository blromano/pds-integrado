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
                echo'<td><input type="checkbox" value="' . $conteudo['PCD_ID'] . '" class="check"></td>';
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

public function TabelaDadosCadastraisPCD($idpcd) {
    try {

        $db = Database::CriarConexao();

        foreach ($idpcd as $ids) {
            $query = "SELECT * FROM pcds WHERE pcds.PCD_ID = " . $ids;

            $stmt = $db->prepare($query);
            $stmt->execute();
            $num_linhas = $stmt->rowCount();
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach ($conteudos as $conteudo) {

                echo'<tr>';
                echo'<td>' . $conteudo['PCD_ID'] . '</td>';
                echo'<td>' . $conteudo['PCD_CIDADE'] . '</td>';
                echo'<td>' . $conteudo['PCD_ESTADO'] . '</td>';
                echo'<td>' . $conteudo['PCD_LATITUDE'] . '</td>';
                echo'<td>' . $conteudo['PCD_LONGITUDE'] . '</td>';
                echo '<td><button type="button" id="' . $conteudo['PCD_ID'] . '" data-toggle="modal" data-target="#modalSensores" class="btn btn-default btn-table btn-sensor">Sensores</button></td> ';
                echo'</tr>';                
            }
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

public function listarDadosComparadosPCDs($idpcd, $dataInicial, $dataFinal) {
    try {
        $db = Database::CriarConexao();

        $dataInicial = DateTime::createFromFormat('d/m/Y', $dataInicial);
        $dataInicial = $dataInicial->format('Y-m-d');
        $dataFinal = DateTime::createFromFormat('d/m/Y', $dataFinal);
        $dataFinal = $dataFinal->format('Y-m-d H:i:s');

        $query = " 
        SELECT 
        DATE_FORMAT(m.MED_DATA_HORA_MEDICAO,'%d-%m-%Y') AS DATA,
        si.PCD_ID PCD, 
        ti.TSE_TIPO_SENSOR TP_SENSOR,
        ti.TSE_DESCRICAO DESC_SENSOR,
        ti.TSE_UNIDADE_MEDIDA UNI_SENSOR,
        tm.TIM_NOME MED_NOME,
        AVG(m.MED_DADO) AS DADO
        FROM 
        medicoes m,
        sensores_instalados_sensores si,
        tipos_sensores ti, 
        tipos_medicoes tm
        WHERE
        m.SEN_ID = si.SEN_ID AND
        si.TSE_ID = ti.TSE_ID AND
        tm.TIM_ID = ti.TIM_ID AND
        (si.PCD_ID = " . $idpcd[0] . " OR si.PCD_ID = " . $idpcd[1];
        if($idpcd[2] != 'undefined')  $query = $query . ' OR sensores_instalados_sensores.PCD_ID = ' . $idpcd[2] . '';
        $query = $query . 
        ") AND m.MED_DATA_HORA_MEDICAO BETWEEN '" . $dataInicial . "' AND '" . $dataFinal . " 23:59:59'
        GROUP BY 
        PCD, DATA, TP_SENSOR
        ORDER BY
         m.MED_DATA_HORA_MEDICAO, PCD, DADO";

        $stmt = $db->prepare($query);
        $stmt->execute();
        $num_linhas = $stmt->rowCount();
        $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($num_linhas >= 1) {

            foreach ($conteudos as $conteudo) {
                echo'<tr>';
                echo'<td>' . $conteudo['DATA'] . '</td>';
                echo'<td>' . $conteudo['TP_SENSOR'] . '</td>';
                echo'<td>' . $conteudo['MED_NOME'] . '</td>';
                echo'<td>' . $conteudo['DADO'] . $conteudo['UNI_SENSOR'] . '</td>';
                echo'<td>' . $conteudo['PCD'] . '</td>';
                echo'</tr>';
            }
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
        return $stmt;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

}
