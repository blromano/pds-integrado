<?php

require_once '../../../modelo/Database.php';
require_once '../../../modelo/alertaCritico.php';
require_once '../../../modelo/alertaUser.php';
require_once '../../../modelo/paramAlertas.php';
require_once '../../../modelo/medicao.php';
require_once '../../PHPMailer/PHPMailerAutoload.php';

class alertaCriticoDAO {

  public function getLastId(){
    try {
      $db = Database::conectar();
      $query = "SELECT ALC_ID from alertas_criticos ORDER BY ALC_ID DESC LIMIT 1";
      $stmt = $db->prepare($query);
      $stmt->execute();
      $rows = $stmt->fetch(); 
      return $rows['ALC_ID'];
    } catch (PDOException $e) {
      echo $e->getMessage();
      exit();
    }
  }

  public function prepareData($lastId, $user){
    try {
     $db = Database::conectar();
     $query = "SELECT ac.ALC_ID, ac.SEN_ID FROM alertas_criticos as ac WHERE ac.ALC_ID > :lastId ORDER BY ALC_ID DESC LIMIT 1";
     $stmt = $db->prepare($query);
     $stmt->bindValue(":lastId", $lastId, PDO::PARAM_INT);
     $stmt->execute();
     $ultimoAlerta = $stmt->fetch();
     if($stmt->rowCount() == 1){
      $idAlerta = $ultimoAlerta['ALC_ID'];
       if($ultimoAlerta['SEN_ID'] != null){
         $query = "SELECT AC.ALC_ID, ta.TAL_NOME, p.PCD_ID, p.PCD_CIDADE, p.PCD_LATITUDE, p.PCD_LONGITUDE, ac.ALC_VALOR_MEDICAO, ac.ALC_DATA_HORA_ALERTA, pa.PRA_VALOR_MAXIMO, pa.PRA_VALOR_MINIMO, pa.PRA_COR_MINIMA, pa.PRA_COR_MAXIMA, ts.TSE_UNIDADE_MEDIDA FROM alertas_criticos as ac, sensores_instalados_sensores as si, pcds as p, pcds_interesse_usuario as pu, usuarios as u, parametros_de_alertas as pa, tipo_alerta as ta, tipos_sensores as ts WHERE ac.ALC_ID = :alertaId  AND ac.TAL_ID = ta.TAL_ID AND ac.SEN_ID = si.SEN_ID AND si.TSE_ID = ts.TSE_ID AND si.SEN_ID = pa.SEN_ID AND si.PCD_ID = p.PCD_ID AND p.PCD_ID = pu.PCD_ID AND u.USU_ID = pu.USU_ID  AND u.USU_ID = :idUser";
         $stmt = $db->prepare($query);
         $stmt->bindValue(":alertaId", $idAlerta, PDO::PARAM_INT);
         $stmt->bindValue(":idUser", $user, PDO::PARAM_INT);
         $stmt->execute();
         $infos = $stmt->fetch();

         $horaAlerta = date_create($infos['ALC_DATA_HORA_ALERTA']);
         $horaAlerta = date_format($horaAlerta, "H:i");

         $valorMedicao = $infos['ALC_VALOR_MEDICAO'];
         $valorMin = $infos['PRA_VALOR_MINIMO'];
         $valorMax = $infos['PRA_VALOR_MAXIMO'];

         
         $tipoAlerta = $infos['TAL_NOME'];

         $iniFile = parse_ini_file("infoAlertas.ini", true);

         $caminhoIMG = $iniFile[$tipoAlerta]["LOGO_ALERTA_SERVER"];

         $cidade = $infos['PCD_CIDADE'];
         $idPCD = $infos['PCD_ID'];

         $simboloMedicao = $infos['TSE_UNIDADE_MEDIDA'];
         $tipoMedicao = $iniFile[$tipoAlerta]['TIPO_MEDICAO'];   

         $latitude = $infos['PCD_LATITUDE'];
         $longitude = $infos['PCD_LONGITUDE'];
         $corMarcador = ($iniFile[$tipoAlerta]["COR"] == "+") ? $infos['PRA_COR_MAXIMA'] : $infos['PRA_COR_MINIMA'];;

         return array(
           "fonte" => "pcd",
           "idAlerta" => $idAlerta,
           "idPCD" => "$idPCD",
           "tipoAlerta" => "$tipoAlerta",
           "caminhoIMG" => "$caminhoIMG",
           "cidade" => "$cidade",
           "hora" => "$horaAlerta",
           "tipoMedicao" => "$tipoMedicao",
           "simboloMedicao" => "$simboloMedicao",
           "valorMin" => "$valorMin",
           "valorMax" => "$valorMax",
           "valorMedicao" => "$valorMedicao",
           "latitude" => "$latitude",
           "longitude" => "$longitude",
           "cor" => "$corMarcador"
           );

       } else {
        $query = "SELECT ac.ALC_ID, aeu.ALU_CIDADE, aeu.ALU_RUA, aeu.ALU_BAIRRO, aeu.ALU_DATA_HORA_ALERTA, aeu.ALU_DESCRICAO, ta.TAL_NOME
        FROM alertas_enviados_usuarios as aeu, usuarios as u, alertas_criticos as ac, tipo_alerta as ta 
        WHERE ac.ALC_ID = :alertaId AND ac.ALU_ID = aeu.ALU_ID AND ac.TAL_ID = ta.TAL_ID AND u.USU_CIDADE = aeu.ALU_CIDADE AND u.USU_ID = :idUser";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":alertaId", $ultimoAlerta['ALC_ID'], PDO::PARAM_INT);
        $stmt->bindValue(":idUser", $user, PDO::PARAM_INT);
        $stmt->execute();
        $infos = $stmt->fetch();

        $tipoAlerta = $infos['TAL_NOME'];

        $horaAlerta = date_create($infos['ALU_DATA_HORA_ALERTA']);
        $horaAlerta = date_format($horaAlerta, "H:i");

        $iniFile = parse_ini_file("infoAlertas.ini", true);
        $caminhoIMG = $iniFile[$tipoAlerta]["LOGO_ALERTA_SERVER"];

        $cidade = $infos['ALU_CIDADE'];
        $bairro = $infos['ALU_BAIRRO'];
        $rua = $infos['ALU_RUA'];

        return array(
         "fonte" => "user",
         "idAlerta" => $idAlerta,
         "tipoAlerta" => "$tipoAlerta",
         "caminhoIMG" => "$caminhoIMG",
         "cidade" => "$cidade",
         "bairro" => "$bairro",
         "rua" => "$rua",
         "hora" => "$horaAlerta"
         );
      }
    } 
    return false;
  } catch (PDOException $e) {
   echo $e->getMessage();
   exit();
 }
}

  public function checarAlertasUsuarios($lastId){
    try {
      $db = Database::conectar();
      $query = "SELECT ac.ALC_ID, aeu.ALU_CIDADE, aeu.ALU_RUA, aeu.ALU_BAIRRO, aeu.ALU_DATA_HORA_ALERTA, aeu.ALU_DESCRICAO, ta.TAL_NOME, u.USU_NOME, u.USU_EMAIL 
      FROM alertas_enviados_usuarios AS aeu, usuarios as u, alertas_criticos AS ac, tipo_alerta AS ta 
      WHERE ac.ALU_ID = aeu.ALU_ID AND ac.ALU_ID IS NOT NULL AND ac.TAL_ID = ta.TAL_ID AND u.USU_CIDADE = aeu.ALU_CIDADE AND ac.ALC_ID > :lastId";
      $stmt = $db->prepare($query);
      $stmt->bindValue(":lastId", $lastId, PDO::PARAM_INT);
      $stmt->execute();
      $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); 
      foreach ($rows as $alerta) {
        $alertaUser = new alertaUser(null, $alerta['ALU_DESCRICAO'], $alerta['ALU_RUA'], $alerta['ALU_BAIRRO'], $alerta['ALU_CIDADE'], null, $alerta['ALU_DATA_HORA_ALERTA'], null, null, null);
        $this::prepareEmailUser($alertaUser, $alerta['TAL_NOME'], $alerta['USU_NOME'], $alerta['USU_EMAIL']);
        $lastId = $alerta['ALC_ID'];
      }      
      return $lastId;
    } catch (PDOException $e) {
      echo $e->getMessage();
      exit();
    }
  }

  public function prepareEmailUser($alertaUser, $tipoAlerta, $nomeUsuario, $emailUser){
    $dataAlerta = date_create($alertaUser->getDate());
    $diaAlerta = date_format($dataAlerta, "d/m/Y");
    $horaAlerta = date_format($dataAlerta, "H:i");

    $cidade = $alertaUser->getCidade();
    $bairro = $alertaUser->getBairro();
    $rua = $alertaUser->getRua();
    $descricao = $alertaUser->getDescricao();


    $infosAlertas = parse_ini_file("infoAlertas.ini", true);
    $conteudoEmail = file_get_contents('alertaUserEmail.html');

    $conteudoEmail = str_replace("TIPO_ALERTA", $infosAlertas[$tipoAlerta]["TIPO_ALERTA"], $conteudoEmail);
    $conteudoEmail = str_replace("LOGO_ALERTA", $infosAlertas[$tipoAlerta]["LOGO_ALERTA"], $conteudoEmail);

    $conteudoEmail = str_replace("NOME_USER", $nomeUsuario, $conteudoEmail);
    $conteudoEmail = str_replace("CIDADE_ALERTA", $cidade, $conteudoEmail);
    $conteudoEmail = str_replace("BAIRRO_ALERTA", $bairro, $conteudoEmail);
    $conteudoEmail = str_replace("RUA_ALERTA", $rua, $conteudoEmail);
    $conteudoEmail = str_replace("DESCRICAO_ALERTA", $descricao, $conteudoEmail);

    $conteudoEmail = str_replace("HORA_ALERTA", $horaAlerta, $conteudoEmail);
    $conteudoEmail = str_replace("DIA_ALERTA", $diaAlerta, $conteudoEmail);
    $this::sendEmail($emailUser, $nomeUsuario, $conteudoEmail, $tipoAlerta);
  }

  public function verificaMedicao($lastId) {
   try {
    $db = Database::conectar();
    $query  = "SELECT m.MED_ID, m.MED_DADO, m.MED_DATA_HORA_MEDICAO, m.API_ID, m.SEN_ID, ts.TSE_TIPO_SENSOR, pa.PRA_VALOR_MAXIMO, pa.PRA_VALOR_MINIMO, pa.PRA_COR_MAXIMA, pa.PRA_COR_MINIMA
              FROM medicoes as m, tipos_sensores as ts, sensores_instalados_sensores as si, parametros_de_alertas as pa
              WHERE MED_ID > :lastId AND si.SEN_ID = m.SEN_ID AND si.SEN_ID = pa.SEN_ID AND si.TSE_ID = ts.TSE_ID";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":lastId", $lastId, PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC); 
    foreach ($rows as $med) {
      $medicao = new medicao($med['MED_ID'], $med['MED_DADO'], $med['MED_DATA_HORA_MEDICAO'], $med['API_ID'], $med['SEN_ID']);
      $parametro = new paramAlertas(null, $med['PRA_VALOR_MAXIMO'], $med['PRA_VALOR_MINIMO'], $med['PRA_COR_MAXIMA'], $med['PRA_COR_MINIMA'], $sensorId);

      $tipoSensor = $med['TSE_TIPO_SENSOR'];
      $valorMedicao = $medicao->getDado();
      $dataHora = $medicao->getDataHora();
      $sensorId = $medicao->getIdSEN();

      $listaAlertas = parse_ini_file("listaTipoAlertas.ini", true);

      if ($tipoSensor == "NÍVEL DE RIO"){
        if($valorMedicao >= ($parametro->getValorMax() * 0.9) && $valorMedicao <= $parametro->getValorMax()){
          $alertaCritico = new alertaCritico($dataHora, $valorMedicao, $sensorId, null, $listaAlertas[$tipoSensor . '%']["ID"]);
          $cor = (strcasecmp($parametro->getCorMax(), "vermelho") == 0) ? "red" : "orange";
          if ($this::create($alertaCritico))
            $this::prepareEmail($alertaCritico, $parametro, $listaAlertas[$tipoSensor . '%']["TIPO_ALERTA"], $cor);
        }
      }
      if($parametro->getValorMax() != null && $parametro->getValorMin() != null){
        if($valorMedicao > $parametro->getValorMax()){
          $alertaCritico = new alertaCritico($dataHora, $valorMedicao, $sensorId, null, $listaAlertas[$tipoSensor . '+']["ID"]);
          $cor = (strcasecmp($parametro->getCorMax(), "vermelho") == 0) ? "red" : "orange";
          if ($this::create($alertaCritico))
            $this::prepareEmail($alertaCritico, $parametro, $listaAlertas[$tipoSensor . '+']["TIPO_ALERTA"], $cor);
        }else if($valorMedicao < $parametro->getValorMin()){
          $alertaCritico = new alertaCritico($dataHora, $valorMedicao, $sensorId, null, $listaAlertas[$tipoSensor . '-']["ID"]);
          $cor = (strcasecmp($parametro->getCorMax(), "azul") == 0) ? "blue" : "green";
          if ($this::create($alertaCritico))
            $this::prepareEmail($alertaCritico, $parametro, $listaAlertas[$tipoSensor . '-']["TIPO_ALERTA"], $cor);
        }
      }else if($parametro->getValorMax() == null){
        if($valorMedicao < $parametro->getValorMin()){
          $alertaCritico = new alertaCritico($dataHora, $valorMedicao, $sensorId, null, $listaAlertas[$tipoSensor . '+']["ID"]);
          $cor = (strcasecmp($parametro->getCorMax(), "vermelho") == 0) ? "red" : "orange";
          $alertaCritico->getDataHora();
          if ($this::create($alertaCritico))
            $this::prepareEmail($alertaCritico, $parametro, $listaAlertas[$tipoSensor . '+']["TIPO_ALERTA"], $cor);
        }
      } else if($parametro->getValorMin() == null){
        if($valorMedicao < $parametro->getValorMax()){
          $alertaCritico = new alertaCritico($dataHora, $valorMedicao, $sensorId, null, $listaAlertas[$tipoSensor . '-']["ID"]);
          $cor = (strcasecmp($parametro->getCorMax(), "azul") == 0) ? "blue" : "green";
          $alertaCritico->getDataHora();
          if ($this::create($alertaCritico))          
            $this::prepareEmail($alertaCritico, $parametro, $listaAlertas[$tipoSensor . '-']["TIPO_ALERTA"], $cor);
        }
    }
    $lastId = $medicao->getId();
  }
  return $lastId;
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit();
  }
}

private function create($alertaCritico){
  try {
    $db = Database::conectar();
    $query = "INSERT INTO alertas_criticos (ALC_DATA_HORA_ALERTA, ALC_VALOR_MEDICAO, SEN_ID, ALU_ID, TAL_ID) VALUES (:dataHora, :valorMedicao, :idSensor, :idAlertaUser, :tipoAlerta)";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":dataHora", $alertaCritico->getDataHora() , PDO::PARAM_STR);
    $stmt->bindValue(":valorMedicao", $alertaCritico->getValorMedicao(), PDO::PARAM_STR);
    $stmt->bindValue(":idSensor", $alertaCritico->getIdSensor(), PDO::PARAM_INT);
    $stmt->bindValue(":idAlertaUser", $alertaCritico->getIdAlertaUser(), PDO::PARAM_INT);
    $stmt->bindValue(":tipoAlerta", $alertaCritico->getTipoAlerta(), PDO::PARAM_INT);
    return $stmt->execute();
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit();
  }
}

private function prepareEmail($alertaCritico, $param, $tipoAlerta, $cor){
  try {
    $db = Database::conectar();
    $query = "SELECT u.USU_NOME, u.USU_EMAIL, p.PCD_CIDADE, p.PCD_ID, p.PCD_LATITUDE, p.PCD_LONGITUDE, ts.TSE_UNIDADE_MEDIDA 
              FROM usuarios as u, pcds as p, tipos_sensores as ts, pcds_interesse_usuario as pint, sensores_instalados_sensores as si
              WHERE si.PCD_ID = pint.PCD_ID AND p.PCD_ID = si.PCD_ID AND u.USU_ID = pint.USU_ID AND ts.TSE_ID = si.TSE_ID AND si.SEN_ID = :idSensor";
    $stmt = $db->prepare($query);
    $stmt->bindValue(":idSensor", $alertaCritico->getIdSensor(), PDO::PARAM_INT);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $dataAlerta = date_create($alertaCritico->getDataHora());
    $diaAlerta = date_format($dataAlerta, "d/m/Y");
    $horaAlerta = date_format($dataAlerta, "H:i");
    $valorMedicao = $alertaCritico->getValorMedicao();
    $valorMin = $param->getValorMin();
    $valorMax = $param->getValorMax();
    $infosAlertas = parse_ini_file("infoAlertas.ini", true);
    $contOriginal = file_get_contents('alertaEmail.html');
    foreach ($rows as $alerta) {
      $conteudoEmail = $contOriginal;
      $nomeUsuario = $alerta['USU_NOME'];
      $cidadePCD = $alerta['PCD_CIDADE'];
      $idPCD = $alerta['PCD_ID'];
      $longitude = $alerta['PCD_LONGITUDE'];
      $latitude = $alerta['PCD_LATITUDE'];
      $simboloMedicao = $alerta['TSE_UNIDADE_MEDIDA'];
        
              //AGORA VAMOS SUBSTITUIR TODAS AS PARTES QUE SÃO DINAMICAS DO EMAIL DE ALERTA COM INFORMAÇÕES ESPECIFICAS DO ALERTA PARA O USUARIO
      $conteudoEmail = str_replace("TIPO_ALERTA", $infosAlertas[$tipoAlerta]["TIPO_ALERTA"], $conteudoEmail);
      $conteudoEmail = str_replace("LOGO_ALERTA", $infosAlertas[$tipoAlerta]["LOGO_ALERTA"], $conteudoEmail);
      $conteudoEmail = str_replace("LOGO_NIVEL_ATUAL", $infosAlertas[$tipoAlerta]["LOGO_NIVEL_ATUAL"], $conteudoEmail);
      $conteudoEmail = str_replace("LOGO_NIVEL_NORMAL", $infosAlertas[$tipoAlerta]["LOGO_NIVEL_NORMAL"], $conteudoEmail);
      $conteudoEmail = str_replace("TIPO_MEDICAO", $infosAlertas[$tipoAlerta]["TIPO_MEDICAO"], $conteudoEmail);
      $conteudoEmail = str_replace("LATITUDE", $latitude, $conteudoEmail);
      $conteudoEmail = str_replace("LONGITUDE", $longitude, $conteudoEmail);
      $conteudoEmail = str_replace("COR_MARCADOR", $cor, $conteudoEmail);

      $conteudoEmail = str_replace("NOME_USER", $nomeUsuario, $conteudoEmail);
      $conteudoEmail = str_replace("CIDADE_PCD", $cidadePCD, $conteudoEmail);
      $conteudoEmail = str_replace("ID_PCD", $idPCD, $conteudoEmail);
      $conteudoEmail = str_replace("VALOR_MEDICAO", $valorMedicao, $conteudoEmail);
      $conteudoEmail = str_replace("SIMBOLO_MEDICAO", $simboloMedicao, $conteudoEmail);
      $conteudoEmail = str_replace("PARAM_MIN", $valorMin, $conteudoEmail);
      $conteudoEmail = str_replace("PARAM_MAX", $valorMax, $conteudoEmail);
      $conteudoEmail = str_replace("HORA_ALERTA", $horaAlerta, $conteudoEmail);
      $conteudoEmail = str_replace("DIA_ALERTA", $diaAlerta, $conteudoEmail);
      $this::sendEmail($alerta['USU_EMAIL'], $nomeUsuario, $conteudoEmail, $tipoAlerta);
    }
  } catch (PDOException $e) {
    echo $e->getMessage();
    exit();
  }
}

private function sendEmail($emailUser, $nomeUser, $conteudoEmail, $tipoAlerta){
  $mail = new PHPMailer;
  $mail->isSMTP();
  $mail->SMTPDebug = 0;
  $mail->Debugoutput = 'html';
  $mail->Host = 'smtp.gmail.com';
  $mail->Port = 587;
  $mail->SMTPSecure = 'tls';
  $mail->SMTPAuth = true;

  $mail->Username = "nicolasgnb2@gmail.com";
  $mail->Password = "polo292623";
  $mail->setFrom('indra@ifsp.edu.br', 'INDRA');
  $mail->addReplyTo('indra@ifsp.edu.br', 'INDRA');
  $mail->addAddress($emailUser, $nomeUser);

  $mail->Subject = 'ALERTA DE ' . $tipoAlerta;
  $mail->msgHTML($conteudoEmail);

  if (!$mail->send()) {
    echo "Erro ao enviar email:: " . $mail->ErrorInfo;
  } else {
    echo "Email enviado!";
  }
}




}
