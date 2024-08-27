<?php

include 'Database.php';
include 'PCD.php';

class GraficoDAO {

    public function PCDTabela($idpcd) {
        try {

            $db = Database::CriarConexao();

            $query = "SELECT * FROM pcds WHERE pcds.PCD_ID = " . $idpcd . ";";

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
    
    public function gerarDadosGrafico($idpcd, $idsensor) {
        try {

            $db = Database::CriarConexao();

            $query = "SELECT MED_DADO FROM pcds,sensores_instalados_sensores,medicoes WHERE " . $idpcd . " = pcds.PCD_ID AND " . $idpcd . " = sensores_instalados_sensores.PCD_ID AND " . $idsensor . " = sensores_instalados_sensores.SEN_ID AND " . $idsensor . "  = medicoes.SEN_ID;";

            $stmt = $db->prepare($query);
            $stmt->execute();
            $num_linhas = $stmt->rowCount();
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

//echo '<script language=javascript>var html;</script>';

            if ($num_linhas >= 1) {

                foreach ($conteudos as $conteudo) {

                    echo '' . $conteudo['MED_DADO'] . ',';
                }
            } else {

                return(0);
                printf("Não há nenhum Dado resgistrado na Base de Dados!");
            }

//echo '<script language=javascript>html.;</script>';
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function gerarHorariosGrafico($idpcd, $idsensor) {
        try {

            $db = Database::CriarConexao();

            $query = "SELECT HOUR(medicoes.MED_DATA_HORA_MEDICAO) AS HORA FROM pcds,sensores_instalados_sensores,medicoes WHERE " . $idpcd . " = pcds.PCD_ID AND " . $idpcd . " = sensores_instalados_sensores.PCD_ID AND " . $idsensor . " = sensores_instalados_sensores.SEN_ID AND " . $idsensor . "  = medicoes.SEN_ID;";

            $stmt = $db->prepare($query);
            $stmt->execute();
            $num_linhas = $stmt->rowCount();
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

//echo '<script language=javascript>var html;</script>';

            if ($num_linhas >= 1) {

                foreach ($conteudos as $conteudo) {

                    echo '' . $conteudo['HORA'] . ',';
                }
            } else {

                return(0);
                printf("Não há nenhuma Hora resgistrado na Base de Dados!");
            }

//echo '<script language=javascript>html.;</script>';
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function listarSensoresPCD($idpcd) {
        try {

            $db = Database::CriarConexao();

            $query = "SELECT tipos_medicoes.TIM_ID,tipos_medicoes.TIM_NOME FROM pcds,tipos_medicoes,tipos_sensores,sensores_instalados_sensores WHERE pcds.PCD_ID = " . $idpcd . " AND sensores_instalados_sensores.PCD_ID = " . $idpcd . " AND sensores_instalados_sensores.TSE_ID = tipos_sensores.TSE_ID AND tipos_sensores.TIM_ID = tipos_medicoes.TIM_ID ";

            $stmt = $db->prepare($query);
            $stmt->execute();
            $num_linhas = $stmt->rowCount();
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($num_linhas >= 1) {

                foreach ($conteudos as $conteudo) {

                    echo'<option>' . $conteudo['TIM_NOME'] . '</option>';
                }
            } else {

                printf("Não há nenhum Tipo de Medição resgistrado na Base de Dados!");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function renomearGraficoPCD($idpcd, $sensor_nome) {
        try {

            $db = Database::CriarConexao();

            $query = "SELECT tipos_medicoes.TIM_NOME FROM pcds,tipos_medicoes,tipos_sensores,sensores_instalados_sensores WHERE pcds.PCD_ID = " . $idpcd . " AND sensores_instalados_sensores.PCD_ID = " . $idpcd . " AND sensores_instalados_sensores.TSE_ID = tipos_sensores.TSE_ID AND tipos_sensores.TIM_ID = tipos_medicoes.TIM_ID AND tipos_medicoes.TIM_NOME = '" . $sensor_nome . "'";

            $stmt = $db->prepare($query);
            $stmt->execute();
            $num_linhas = $stmt->rowCount();
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($num_linhas >= 1) {

                foreach ($conteudos as $conteudo) {

                    echo'<h4>' . $conteudo['TIM_NOME'] . ' - Gráfico Linear</h4>';
                    break;
                }
            } else {

                printf("Não há nenhum Tipo de Nome de Sensor resgistrado na Base de Dados!");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function sensorSelecionadoGraficoPCD($idpcd, $sensor_nome) {
        try {

            $db = Database::CriarConexao();

            $query = "SELECT sensores_instalados_sensores.SEN_ID FROM pcds,tipos_medicoes,tipos_sensores,sensores_instalados_sensores WHERE pcds.PCD_ID = " . $idpcd . " AND sensores_instalados_sensores.PCD_ID = " . $idpcd . " AND sensores_instalados_sensores.TSE_ID = tipos_sensores.TSE_ID AND tipos_sensores.TIM_ID = tipos_medicoes.TIM_ID AND tipos_medicoes.TIM_NOME = '" . $sensor_nome . "'";

            $stmt = $db->prepare($query);
            $stmt->execute();
            $num_linhas = $stmt->rowCount();
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if ($num_linhas >= 1) {

                foreach ($conteudos as $conteudo) {

                    return ($conteudo['SEN_ID']);
                }
            } else {

                printf("Não há nenhum Tipo de Nome de Sensor resgistrado na Base de Dados!");
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function gerarDadosDataGrafico($idpcd, $idsensor,$dataInicial,$dataFinal) {
        try {

            $db = Database::CriarConexao();

            if (empty($dataInicial)) {

                $query = "SELECT MED_DADO FROM pcds,sensores_instalados_sensores,medicoes WHERE " . $idpcd . " = pcds.PCD_ID AND " . $idpcd . " = sensores_instalados_sensores.PCD_ID AND " . $idsensor . " = sensores_instalados_sensores.SEN_ID AND " . $idsensor . "  = medicoes.SEN_ID ORDER BY DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'%Y/%m/%d %H:%i');";

            } else {

                $dataInicial = DateTime::createFromFormat('d/m/Y', $dataInicial);
                $dataInicial = $dataInicial->modify('-1 day');
                $dataInicial = $dataInicial->format('Y-m-d H:i:s');
                $dataFinal = DateTime::createFromFormat('d/m/Y', $dataFinal);
                //$dataFinal = $dataFinal->modify('+1 day');
                $dataFinal = $dataFinal->format('Y-m-d H:i:s');

                $query = "SELECT MED_DADO FROM pcds,sensores_instalados_sensores,medicoes WHERE " . $idpcd . " = pcds.PCD_ID AND " . $idpcd . " = sensores_instalados_sensores.PCD_ID AND " . $idsensor . " = sensores_instalados_sensores.SEN_ID AND " . $idsensor . "  = medicoes.SEN_ID AND DATE(medicoes.MED_DATA_HORA_MEDICAO) BETWEEN '" . $dataInicial . " 00:00:00' AND '" . $dataFinal . " 23:59:59' ORDER BY DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'%Y/%m/%d %H:%i');";

            }

            $stmt = $db->prepare($query);
            $stmt->execute();
            $num_linhas = $stmt->rowCount();
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

//echo '<script language=javascript>var html;</script>';

            if ($num_linhas >= 1) {

                foreach ($conteudos as $conteudo) {

                    echo '' . $conteudo['MED_DADO'] . ',';
                }
            } else {

                return(0);
                printf("Não há nenhum Dado resgistrado na Base de Dados!");
            }

//echo '<script language=javascript>html.;</script>';
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function gerarHorariosDataGrafico($idpcd, $idsensor,$dataInicial,$dataFinal) {
        try {

            $db = Database::CriarConexao();

            if (empty($dataInicial)) {

                $query = "SELECT DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'%d/%m/%Y %H:%i') AS HORA FROM pcds,sensores_instalados_sensores,medicoes WHERE " . $idpcd . " = PCD_ID AND " . $idpcd . " = sensores_instalados_sensores.PCD_ID AND " . $idsensor . " = sensores_instalados_sensores.SEN_ID AND " . $idsensor . "  = medicoes.SEN_ID ORDER BY DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'%Y/%m/%d %H:%i');";

            } else {

                $dataInicial = DateTime::createFromFormat('d/m/Y', $dataInicial);
                $dataInicial = $dataInicial->modify('-1 day');
                $dataInicial = $dataInicial->format('Y-m-d H:i:s');
                $dataFinal = DateTime::createFromFormat('d/m/Y', $dataFinal);
                //$dataFinal = $dataFinal->modify('+1 day');
                $dataFinal = $dataFinal->format('Y-m-d H:i:s');

                /*$query = "SELECT DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'%d/%m/%Y %h:%i') AS HORA FROM pcds,sensores_instalados_sensores,medicoes WHERE " . $idpcd . " = pcds.PCD_ID AND " . $idpcd . " = sensores_instalados_sensores.PCD_ID AND " . $idsensor . " = sensores_instalados_sensores.SEN_ID AND " . $idsensor . " = medicoes.SEN_ID AND medicoes.MED_DATA_HORA_MEDICAO BETWEEN '" . $dataInicial . " 00:00:00' AND '" . $dataFinal . " 23:59:59' ORDER BY medicoes.MED_DATA_HORA_MEDICAO;";*/

                $query = "SELECT DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'%d/%m/%Y %H:%i') AS HORA FROM pcds,sensores_instalados_sensores,medicoes WHERE " . $idpcd . " = pcds.PCD_ID AND " . $idpcd . " = sensores_instalados_sensores.PCD_ID AND " . $idsensor . " = sensores_instalados_sensores.SEN_ID AND " . $idsensor . "  = medicoes.SEN_ID AND DATE(medicoes.MED_DATA_HORA_MEDICAO) BETWEEN '" . $dataInicial . " 00:00:00' AND '" . $dataFinal . " 23:59:59' ORDER BY DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'%Y/%m/%d %H:%i');";

                //echo $query;
                //exit();

            }

            $stmt = $db->prepare($query);
            $stmt->execute();
            $num_linhas = $stmt->rowCount();
            $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

//echo '<script language=javascript>var html;</script>';

            if ($num_linhas >= 1) {

                foreach ($conteudos as $conteudo) {

                    echo '"' . $conteudo['HORA'] . '",';
                }
            } else {

                return(0);
                printf("Não há nenhuma Hora resgistrado na Base de Dados!");
            }

//echo '<script language=javascript>html.;</script>';
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function contadorDiasGrafico($dataInicial,$dataFinal){

     try {

        $db = Database::CriarConexao();

        $dataInicial = DateTime::createFromFormat('d/m/Y', $dataInicial);
        //$dataInicial = $dataInicial->modify('-1 day');
        $dataInicial = $dataInicial->format('Y-m-d H:i:s');
        $dataFinal = DateTime::createFromFormat('d/m/Y', $dataFinal);
        //$dataFinal = $dataFinal->modify('+1 day');
        $dataFinal = $dataFinal->format('Y-m-d H:i:s');

        $query = "SELECT DATEDIFF('" . $dataFinal . "','" . $dataInicial . "') AS DATA_DIFERENÇA;";

        $stmt = $db->prepare($query);
        $stmt->execute();
        $num_linhas = $stmt->rowCount();
        $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

        if ($num_linhas >= 1) {

            foreach ($conteudos as $conteudo) {

                if($conteudo['DATA_DIFERENÇA']<=7){

                    return ("Horário");

                }else{

                    if($conteudo['DATA_DIFERENÇA']>7 && $conteudo['DATA_DIFERENÇA']<=30){

                        return ("Diário");

                    }else{

                        if($conteudo['DATA_DIFERENÇA']>30 && $conteudo['DATA_DIFERENÇA']<=90){

                            return ("Semanal");

                        }else{

                            if($conteudo['DATA_DIFERENÇA']>90 && $conteudo['DATA_DIFERENÇA']<=1095){

                                return ("Mensal");

                            }else{

                                if($conteudo['DATA_DIFERENÇA']>1095){

                                    return ("Anual");

                                }
                            }
                        }
                    }

                }

                //echo $conteudo['DATA_DIFERENÇA'];
                return $conteudo['DATA_DIFERENÇA'];
            }
        } else {

            printf("Não há nenhuma Data resgistrado na Base de Dados!");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }

}

public function FiltrarcontadorDiasGrafico($dataInicial,$dataFinal){

    $objeto = new GraficoDAO();

    if($objeto->contadorDiasGrafico($dataInicial,$dataFinal)=="Horário"){

        return '%H';
    }
    if($objeto->contadorDiasGrafico($dataInicial,$dataFinal)=="Diário"){

        return '%d';
    }
    if($objeto->contadorDiasGrafico($dataInicial,$dataFinal)=="Semanal"){

        return '%U';
    }
    if($objeto->contadorDiasGrafico($dataInicial,$dataFinal)=="Mensal"){

        return '%m';
    }
    if($objeto->contadorDiasGrafico($dataInicial,$dataFinal)=="Anual"){

        return '%y';
    }

}

    public function FiltrarPeriodoGrafico($dataInicial,$dataFinal){

    $objeto = new GraficoDAO();

    if($objeto->contadorDiasGrafico($dataInicial,$dataFinal)=="Horário"){

        return '%d/%m/%Y %H:%i';
    }
    if($objeto->contadorDiasGrafico($dataInicial,$dataFinal)=="Diário"){

        return '%d/%m/%Y';
    }
    if($objeto->contadorDiasGrafico($dataInicial,$dataFinal)=="Semanal"){

        return '%U-%m/%Y';
    }
    if($objeto->contadorDiasGrafico($dataInicial,$dataFinal)=="Mensal"){

        return '%m/%Y';
    }
    if($objeto->contadorDiasGrafico($dataInicial,$dataFinal)=="Anual"){

        return '%Y';
    }

}

public function gerarDadosMediaGrafico($idpcd, $idsensor,$dataInicial,$dataFinal) {
    try {

        $objeto = new GraficoDAO();
        $db = Database::CriarConexao();
        $filtro = null;            

        if (empty($dataInicial)) {

            $query = "SELECT MED_DADO FROM pcds,sensores_instalados_sensores,medicoes WHERE " . $idpcd . " = pcds.PCD_ID AND " . $idpcd . " = sensores_instalados_sensores.PCD_ID AND " . $idsensor . " = sensores_instalados_sensores.SEN_ID AND " . $idsensor . "  = medicoes.SEN_ID;";

        } else {

         $filtro = $objeto->FiltrarcontadorDiasGrafico($dataInicial,$dataFinal);

           //echo $query;
            //exit();


         $dataInicial = DateTime::createFromFormat('d/m/Y', $dataInicial);
         $dataInicial = $dataInicial->modify('-1 day');
         $dataInicial = $dataInicial->format('Y-m-d H:i:s');
         $dataFinal = DateTime::createFromFormat('d/m/Y', $dataFinal);
                //$dataFinal = $dataFinal->modify('+1 day');
         $dataFinal = $dataFinal->format('Y-m-d H:i:s');


         $query = "SELECT AVG(medicoes.MED_DADO) AS DADO FROM pcds,sensores_instalados_sensores,medicoes WHERE " . $idpcd ." = pcds.PCD_ID AND " . $idpcd . " = sensores_instalados_sensores.PCD_ID AND " . $idsensor . " = sensores_instalados_sensores.SEN_ID AND " . $idsensor . "  = medicoes.SEN_ID AND DATE(medicoes.MED_DATA_HORA_MEDICAO) BETWEEN '" . $dataInicial . "' AND '" . $dataFinal . " 23:59:59' GROUP BY DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'" . $filtro . "')  ORDER BY DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'" . $filtro . "'),DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'%Y/%m/%d %H:%i');";

            //echo $query;
            //exit();

     }

     $stmt = $db->prepare($query);
     $stmt->execute();
     $num_linhas = $stmt->rowCount();
     $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

//echo '<script language=javascript>var html;</script>';

     if ($num_linhas >= 1) {

        foreach ($conteudos as $conteudo) {

            echo '' . $conteudo['DADO'] . ',';
        }
    } else {

        return(0);
        printf("Não há nenhum Dado resgistrado na Base de Dados!");
    }

//echo '<script language=javascript>html.;</script>';
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}
}


public function gerarHorariosMediaGrafico($idpcd, $idsensor,$dataInicial,$dataFinal) {
    try {

        $objeto = new GraficoDAO();
        $db = Database::CriarConexao();
        $filtro = null;  
        $periodo = null;

        $filtro = $objeto->FiltrarcontadorDiasGrafico($dataInicial,$dataFinal);
         $periodo = $objeto->FiltrarPeriodoGrafico($dataInicial,$dataFinal);

        if (empty($dataInicial)) {

           $query = "SELECT DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'". $periodo . "') AS HORA FROM pcds,sensores_instalados_sensores,medicoes WHERE " . $idpcd . " = PCD_ID AND " . $idpcd . " = sensores_instalados_sensores.PCD_ID AND " . $idsensor . " = sensores_instalados_sensores.SEN_ID AND " . $idsensor . "  = medicoes.SEN_ID ORDER BY DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'%Y/%m/%d %H:%i');";


        } else {

         $dataInicial = DateTime::createFromFormat('d/m/Y', $dataInicial);
         $dataInicial = $dataInicial->modify('-1 day');
         $dataInicial = $dataInicial->format('Y-m-d H:i:s');
         $dataFinal = DateTime::createFromFormat('d/m/Y', $dataFinal);
            //$dataFinal = $dataFinal->modify('+1 day');
         $dataFinal = $dataFinal->format('Y-m-d H:i:s');


         $query = "SELECT DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'" . $periodo ."') AS HORA FROM pcds,sensores_instalados_sensores,medicoes WHERE " . $idpcd ." = pcds.PCD_ID AND " . $idpcd . " = sensores_instalados_sensores.PCD_ID AND " . $idsensor . " = sensores_instalados_sensores.SEN_ID AND " . $idsensor . "  = medicoes.SEN_ID AND DATE(medicoes.MED_DATA_HORA_MEDICAO) BETWEEN '" . $dataInicial . "' AND '" . $dataFinal . " 23:59:59' GROUP BY DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'" . $filtro . "')  ORDER BY DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'" . $filtro . "'),DATE_FORMAT(medicoes.MED_DATA_HORA_MEDICAO,'%Y/%m/%d %H:%i');";

            //echo $query;
            //exit();

     }

     $stmt = $db->prepare($query);
     $stmt->execute();
     $num_linhas = $stmt->rowCount();
     $conteudos = $stmt->fetchAll(PDO::FETCH_ASSOC);

//echo '<script language=javascript>var html;</script>';

     if ($num_linhas >= 1) {

        foreach ($conteudos as $conteudo) {

            echo '"' . $conteudo['HORA'] . '",';
        }
    } else {

        return(0);
        printf("Não há nenhum Dado resgistrado na Base de Dados!");
    }

//echo '<script language=javascript>html.;</script>';
} catch (PDOException $e) {
    echo $e->getMessage();
    exit();
}
}


}
