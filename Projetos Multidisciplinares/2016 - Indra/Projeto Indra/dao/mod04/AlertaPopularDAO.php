<?php

include 'Database.php';
include 'PCD.php';

class AlertaPopularDAO {

    public function listarAlertasPopular($dataInicial, $dataFinal) {
        try {

            $db = Database::CriarConexao();

            if (empty($dataInicial)) {
                $query = "SELECT TAL_ICONE,TAL_NOME,USU_NOME,ALU_RUA,ALU_BAIRRO,ALU_CIDADE,ALU_DATA_HORA_ALERTA AS PERIODO,ALU_STATUS,ALU_DESCRICAO,ALU_URL_FOTO_1,ALU_URL_FOTO_2,ALU_URL_FOTO_3,ALU_URL_FOTO_4,ALU_URL_FOTO_5 "
                        . "FROM alertas_enviados_usuarios,usuarios,tipo_alerta "
                        . "WHERE alertas_enviados_usuarios.USU_ID = usuarios.USU_ID "
                        . "AND alertas_enviados_usuarios.TAL_ID = tipo_alerta.TAL_ID ORDER BY PERIODO;";
            } else {

                $dataInicial = DateTime::createFromFormat('d/m/Y', $dataInicial);
                $dataInicial = $dataInicial->modify('-1 day');
                $dataInicial = $dataInicial->format('Y-m-d H:i:s');
                $dataFinal = DateTime::createFromFormat('d/m/Y', $dataFinal);
                //$dataFinal = $dataFinal->modify('+1 day');
                $dataFinal = $dataFinal->format('Y-m-d H:i:s');

                $query = "SELECT TAL_NOME,USU_NOME,ALU_RUA,ALU_BAIRRO,ALU_CIDADE,ALU_DATA_HORA_ALERTA AS PERIODO,ALU_STATUS,ALU_DESCRICAO,ALU_URL_FOTO_1,ALU_URL_FOTO_2,ALU_URL_FOTO_3,ALU_URL_FOTO_4,ALU_URL_FOTO_5 "
                        . "FROM alertas_enviados_usuarios,usuarios,tipo_alerta "
                        . "WHERE alertas_enviados_usuarios.USU_ID = usuarios.USU_ID "
                        . "AND alertas_enviados_usuarios.TAL_ID = tipo_alerta.TAL_ID "
                        . "AND DATE(alertas_enviados_usuarios.ALU_DATA_HORA_ALERTA) BETWEEN '" . $dataInicial . "' AND '" . $dataFinal . "';";
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
                    echo'<td>' . $conteudo['USU_NOME'] . '</td>';
                    echo'<td>' . $conteudo['ALU_RUA'] . '</td>';
                    echo'<td>' . $conteudo['ALU_BAIRRO'] . '</td>';
                    echo'<td>' . $conteudo['ALU_CIDADE'] . '</td>';
                    echo'<td>' . $diaMedicao . '</td>';
                    echo'<td>' . $horaMedicao . '</td>';
                    echo'<td>' . $conteudo['ALU_STATUS'] . '</td>';
					echo'<td>' . $conteudo['TAL_NOME'] . '</td>';
                    echo'<td>';
                    echo '<button id="{&quot;desc&quot;:&quot;' . $conteudo['ALU_DESCRICAO'] . '&quot,&quot;imagem1&quot;:&quot;..\/..\/' . $conteudo['ALU_URL_FOTO_1'] . '&quot,&quot;imagem2&quot;:&quot;..\/..\/' . $conteudo['ALU_URL_FOTO_2'] . '&quot,&quot;imagem3&quot;:&quot;..\/..\/' . $conteudo['ALU_URL_FOTO_3'] . '&quot,&quot;imagem4&quot;:&quot;..\/..\/' . $conteudo['ALU_URL_FOTO_4'] . '&quot,&quot;imagem5&quot;:&quot;..\/..\/' . $conteudo['ALU_URL_FOTO_5'] . '&quot}" data-toggle="modal" data-target="#modalImagens" class="btn btn-primary btn-table btn-img"> Descrição </button>';
                    echo'</td>';
                    echo'</tr>';
                }
            } 
        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }

    public function listarLocalidades(){
         try {

            $db = Database::CriarConexao();

            $query = "SELECT ALU_RUA, ALU_CIDADE, ALU_BAIRRO FROM alertas_enviados_usuarios;";

            $stmt = $db->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
			
			$htmlCidade = '<label style="float: left; line-height: 300%; margin-right: 1%;">Cidade:</label><select style="width: 15%; float: left;" class="form-control" id="selectCidade"><option value="">Selecione</option>';
			$htmlBairro = '<label style="float: left; line-height: 300%; margin-right: 1%; margin-left: 2%">Bairro:</label><select style="width: 15%; float: left" class="form-control" id="selectBairro"><option value="">Selecione</option>';
            $htmlRua = '<label  style="float: left; line-height: 300%; margin-right: 1%; margin-left: 2%">Rua:</label><select style="width: 15%; float: left" class="form-control" id="selectRua"><option value="">Selecione</option>';
                        

            foreach ($result as $local) {
				$htmlCidade = $htmlCidade . '<option value="' . $local['ALU_CIDADE'] . '">' . $local['ALU_CIDADE'] . '</option>';
				$htmlBairro = $htmlBairro . '<option value="' . $local['ALU_BAIRRO'] . '">' . $local['ALU_BAIRRO'] . '</option>';
                $htmlRua = $htmlRua . '<option  value="' . $local['ALU_RUA'] . '">' . $local['ALU_RUA'] . '</option>'; 
                 
                 
            }
			$htmlCidade = $htmlCidade . "</select>";
			$htmlBairro = $htmlBairro . "</select>";
            $htmlRua = $htmlRua . "</select>";
            
            

            echo $htmlCidade . $htmlBairro . $htmlRua;


        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
      }
    
}
