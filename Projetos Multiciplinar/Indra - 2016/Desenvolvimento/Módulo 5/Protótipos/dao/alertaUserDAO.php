<?php

require_once '../../../modelo/Database.php';
require_once '../../../modelo/alertaUser.php';

class alertaUserDAO {



     public function editar($alertUser) {
        try {
            $db = Database::conectar();
            $query = "UPDATE alertas_enviados_usuarios SET  ALU_DESCRICAO = :descricao, ALU_RUA = :rua, ALU_BAIRRO = :bairro, ALU_CIDADE = :cidade, ALU_DATA_HORA_ALERTA = NOW(), TAL_ID = :tipoalerta, ALU_STATUS = 'Em Validação'  WHERE ALU_ID = :id";
           
            $stmt = $db->prepare($query);
            $stmt->bindValue(":descricao",$alertUser->getDescricao(), PDO::PARAM_STR);
            $stmt->bindValue(":rua",$alertUser->getRua(), PDO::PARAM_STR);
            $stmt->bindValue(":bairro",$alertUser->getBairro(), PDO::PARAM_STR);
            $stmt->bindValue(":cidade",$alertUser->getCidade(), PDO::PARAM_STR); 
            $stmt->bindValue(":id",$alertUser->getId(), PDO::PARAM_INT);       
            $stmt->bindValue(":tipoalerta",$alertUser->getIdAlerta(), PDO::PARAM_INT);
            return $stmt->execute();


        } catch (PDOException $e) {
            echo $e->getMessage();
            exit();
        }
    }


   public function create($alertUser) {
    try {
        $db = Database::conectar();
        $query = "INSERT INTO alertas_enviados_usuarios (ALU_DESCRICAO, ALU_STATUS, ALU_RUA, ALU_BAIRRO ,ALU_CIDADE, ALU_URL_FOTO_1, ALU_URL_FOTO_2, ALU_URL_FOTO_3, ALU_URL_FOTO_4, ALU_URL_FOTO_5, USU_ID, TAL_ID, ALU_DATA_HORA_ALERTA) VALUES (:descricao, :status, :rua, :bairro, :cidade, :img1, :img2, :img3, :img4, :img5,:idUser,:idTipoAlerta, :dataHora)";
        $stmt = $db->prepare($query);

        $caminhoImagens = $alertUser->getImgs();
        if(isset($caminhoImagens[0])) $stmt->bindValue(":img1", $caminhoImagens[0], PDO::PARAM_STR);
        else $stmt->bindValue(":img1", null, PDO::PARAM_STR);
        if(isset($caminhoImagens[1])) $stmt->bindValue(":img2", $caminhoImagens[1], PDO::PARAM_STR);
        else $stmt->bindValue(":img2", null, PDO::PARAM_STR);
        if(isset($caminhoImagens[2])) $stmt->bindValue(":img3", $caminhoImagens[2], PDO::PARAM_STR);
        else $stmt->bindValue(":img3", null, PDO::PARAM_STR);
        if(isset($caminhoImagens[3])) $stmt->bindValue(":img4", $caminhoImagens[3], PDO::PARAM_STR);
        else $stmt->bindValue(":img4", null, PDO::PARAM_STR);
        if(isset($caminhoImagens[4])) $stmt->bindValue(":img5", $caminhoImagens[4], PDO::PARAM_STR);
        else $stmt->bindValue(":img5", null, PDO::PARAM_STR);

        $stmt->bindValue(":descricao", $alertUser->getDescricao(), PDO::PARAM_STR);
        $stmt->bindValue(":status", $alertUser->getStatus(), PDO::PARAM_STR);
        $stmt->bindValue(":rua", $alertUser->getRua(), PDO::PARAM_STR);
        $stmt->bindValue(":bairro", $alertUser->getBairro(), PDO::PARAM_STR);
        $stmt->bindValue(":cidade", $alertUser->getCidade(), PDO::PARAM_STR);
        $stmt->bindValue(":idUser", $alertUser->getIdUsuario(), PDO::PARAM_INT);
        $stmt->bindValue(":idTipoAlerta", $alertUser->getIdAlerta(), PDO::PARAM_INT);
        $stmt->bindValue(":dataHora", $alertUser->getDate(), PDO::PARAM_STR);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

public function deletar($id) {
    try{
        $db = Database::conectar();
        $query = "DELETE FROM alertas_enviados_usuarios WHERE ALU_ID = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        return $stmt->execute();
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }

}

public function deletarImagem($num, $caminhoPasta, $arquivosPasta, $id){
    $opcoesBanco =  array(
        1 => "ALU_URL_FOTO_1",
        2 => "ALU_URL_FOTO_2",
        3 => "ALU_URL_FOTO_3",
        4 => "ALU_URL_FOTO_4",
        5 => "ALU_URL_FOTO_5",
        );
    $qntImagens =  count($arquivosPasta)-2;
    try{
        $db = Database::conectar();
        $result = true;
        for($i = $num; $i <= $qntImagens; $i++){
            if($i == $qntImagens) 
                $query =  "UPDATE alertas_enviados_usuarios SET " . $opcoesBanco[$i] . " = NULL WHERE ALU_ID = " . $id;
            else 
                $query = "UPDATE alertas_enviados_usuarios SET " . $opcoesBanco[$i] . " = \"" . $caminhoPasta . "/" . $i. ".jpg\" WHERE ALU_ID = " . $id;
            $stmt = $db->prepare($query);
            if(!$stmt->execute())
                $result = false;            
        }
        return $result;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

public function addImagens($num, $caminhos, $id, $qntImagens){
    $opcoesBanco =  array(
        1 => "ALU_URL_FOTO_1",
        2 => "ALU_URL_FOTO_2",
        3 => "ALU_URL_FOTO_3",
        4 => "ALU_URL_FOTO_4",
        5 => "ALU_URL_FOTO_5",
    );
    try{
        $db = Database::conectar();
        $result = true;
        for($i = $num, $j = 0; $i < $qntImagens + $num; $i++, $j++){
            $query = "UPDATE alertas_enviados_usuarios SET " . $opcoesBanco[$i] . " = \"" . $caminhos[$j] . "\" WHERE ALU_ID = " . $id;
            $stmt = $db->prepare($query);
            if(!$stmt->execute())
                $result = false;            
        }
        return $result;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

public function validarAlerta($id, $valid){
    try {
        $db = Database::conectar();
        $query = "UPDATE alertas_enviados_usuarios SET ALU_STATUS = :valid WHERE ALU_ID = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":valid", $valid, PDO::PARAM_STR);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        if($stmt->execute()){
            if($valid == "Aprovado"){
                $query = "SELECT TAL_ID, ALU_DATA_HORA_ALERTA FROM alertas_enviados_usuarios WHERE ALU_ID = :id";
                $stmt = $db->prepare($query);
                $stmt->bindValue(":id", $id , PDO::PARAM_INT);
                $stmt->execute();
                $alerta = $stmt->fetch();
                $query = "INSERT INTO alertas_criticos (ALC_DATA_HORA_ALERTA, ALC_VALOR_MEDICAO, SEN_ID, ALU_ID, TAL_ID) VALUES (:dataHora, :valorMedicao, :idSensor, :idAlertaUser, :tipoAlerta)";
                  $stmt = $db->prepare($query);
                  $stmt->bindValue(":dataHora", $alerta['ALU_DATA_HORA_ALERTA'] , PDO::PARAM_STR);
                  $stmt->bindValue(":valorMedicao", 0, PDO::PARAM_STR);
                  $stmt->bindValue(":idSensor", null, PDO::PARAM_INT);
                  $stmt->bindValue(":idAlertaUser", $id, PDO::PARAM_INT);
                  $stmt->bindValue(":tipoAlerta", $alerta['TAL_ID'], PDO::PARAM_INT);
                  return $stmt->execute();
            }
            else
                return $stmt->execute();
        }else
            return false;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

public function listar() {
    try {
        $db = Database::conectar();
        $query = "SELECT * FROM alertas_enviados_usuarios";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $alertas = [];
        foreach ($result as $alerta) {
            $dataHora = date_create($alerta['ALU_DATA_HORA_ALERTA']);
            $horaAlerta = date_format($dataHora, "H:i:s");
            $diaAlerta = date_format($dataHora, "d/m/Y");
            $imgs = array($alerta['ALU_URL_FOTO_1'],$alerta['ALU_URL_FOTO_2'], $alerta['ALU_URL_FOTO_3'], $alerta['ALU_URL_FOTO_3'], $alerta['ALU_URL_FOTO_4'], $alerta['ALU_URL_FOTO_5']);
            $idAlerta = $alerta['ALU_ID'];
            $status = $alerta['ALU_STATUS'];
            $cidade = $alerta['ALU_CIDADE'];
            $tipoAlerta = $this::tipoAlerta($alerta['TAL_ID']);
            $rua = $alerta['ALU_RUA'];
            $bairro = $alerta['ALU_BAIRRO'];
            $desc = $alerta['ALU_DESCRICAO'];
             
            $alertas[] = array(
                "id" => "$idAlerta",
                "status" => "$status",
                "data" => "$diaAlerta",
                "hora" => "$horaAlerta",
                "cidade" => "$cidade",
                "alerta" => "$tipoAlerta",
                "rua" => "$rua",  
                "bairro" => "$bairro",
                "desc" => "$desc",             
                "img1" => "$imgs[0]",
                "img2" => "$imgs[1]",
                "img3" => "$imgs[2]",
                "img4" => "$imgs[3]",
                "img5" => "$imgs[4]"              
            );
        }
        return $alertas;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

public function listarByUser(){
    try {
        $db = Database::conectar();
        $query = "SELECT * FROM alertas_enviados_usuarios";
        $stmt = $db->prepare($query);
        $stmt->execute();
        return $stmt;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

public function tipoAlerta($id){
    try {
        $db = Database::conectar();
        $query = "SELECT * FROM tipo_alerta where TAL_ID = :id";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        $conteudo =  $stmt->fetch();
        return $conteudo['TAL_NOME'];
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

public function getIdAlertas(){
    try {
        $db = Database::conectar();
        $query = "SELECT * FROM tipo_alerta";
        $stmt = $db->prepare($query);
        $stmt->execute();
        $conteudo =  $stmt->fetchAll(PDO::FETCH_ASSOC);
        $idAlertas = [];
        foreach ($conteudo as $key) {
            $idAlertas[] = $key['TAL_ID'];
        }
        return $idAlertas;
    } catch (PDOException $e) {
        echo $e->getMessage();
        exit();
    }
}

public function jsonSerialize($data, $hora, $cidade, $alerta) {
    return array(

        "data" => "$data",
        "hora" => "$hora",
        "cidade" => "$cidade",
        "alerta" => "$alerta"
        );
}

}
