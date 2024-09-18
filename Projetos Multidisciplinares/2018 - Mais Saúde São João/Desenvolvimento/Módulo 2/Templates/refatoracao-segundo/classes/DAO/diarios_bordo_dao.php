<?php

require_once 'Conexao.php';

class DIARIOS_BORDO_DAO {

    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;

    public function __construct() {
        $conn = new Conexao();
        $this->conexao = $conn->getConexao();
        $this->tabela = "DIARIOS_BORDO";
    }

    public function lista_diario_bordo_data($escolha_data, $usuario) {
        $this->sql = "SELECT * 
                      FROM DIARIOS_BORDO 
                      WHERE FK_USUARIOS_USU_CODIGO='".$usuario."' AND
                      DIB_DIB_DATA_CRIACAO = '" . $escolha_data . "'";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

    public function recuperar_cafe_manha($dib_codigo, $usuario) {
        $this->sql = "SELECT adb.*, a.ALI_NOME, a.ALI_CALORIAS, db.*
                        FROM ALIMENTOS_DIARIOS_BORDO  adb, ALIMENTOS a, DIARIOS_BORDO db
                        WHERE 
                        adb.FK_DIARIOS_BORDO_DIB_CODIGO = '" . $dib_codigo . "' AND
                        db.DIB_CODIGO = '" . $dib_codigo . "' AND
                        adb.ALI_DIB_CODIGO_REFEICAO = '1' AND
                        db.FK_USUARIOS_USU_CODIGO = '".$usuario."' AND
                        adb.FK_ALIMENTOS_ALI_CODIGO = a.ALI_CODIGO;";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
    public function recuperar_lanche_manha($dib_codigo, $usuario) {
        $this->sql = "SELECT adb.*, a.ALI_NOME, a.ALI_CALORIAS, db.*
                        FROM ALIMENTOS_DIARIOS_BORDO  adb, ALIMENTOS a, DIARIOS_BORDO db
                        WHERE 
                        adb.FK_DIARIOS_BORDO_DIB_CODIGO = '" . $dib_codigo . "' AND
                        db.DIB_CODIGO = '" . $dib_codigo . "' AND
                        adb.ALI_DIB_CODIGO_REFEICAO = '2' AND
                        db.FK_USUARIOS_USU_CODIGO = '".$usuario."' AND
                        adb.FK_ALIMENTOS_ALI_CODIGO = a.ALI_CODIGO;";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
    public function recuperar_almoco($dib_codigo, $usuario) {
        $this->sql = "SELECT adb.*, a.ALI_NOME, a.ALI_CALORIAS, db.*
                        FROM ALIMENTOS_DIARIOS_BORDO  adb, ALIMENTOS a, DIARIOS_BORDO db
                        WHERE 
                        adb.FK_DIARIOS_BORDO_DIB_CODIGO = '" . $dib_codigo . "' AND
                        db.DIB_CODIGO = '" . $dib_codigo . "' AND
                        adb.ALI_DIB_CODIGO_REFEICAO = '3' AND
                        db.FK_USUARIOS_USU_CODIGO = '".$usuario."' AND
                        adb.FK_ALIMENTOS_ALI_CODIGO = a.ALI_CODIGO;";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
    public function recuperar_lanche_tarde($dib_codigo, $usuario) {
        $this->sql = "SELECT adb.*, a.ALI_NOME, a.ALI_CALORIAS, db.*
                        FROM ALIMENTOS_DIARIOS_BORDO  adb, ALIMENTOS a, DIARIOS_BORDO db
                        WHERE 
                        adb.FK_DIARIOS_BORDO_DIB_CODIGO = '" . $dib_codigo . "' AND
                        db.DIB_CODIGO = '" . $dib_codigo . "' AND
                        adb.ALI_DIB_CODIGO_REFEICAO = '4' AND
                        db.FK_USUARIOS_USU_CODIGO = '".$usuario."' AND
                        adb.FK_ALIMENTOS_ALI_CODIGO = a.ALI_CODIGO;";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
    public function recuperar_cafe_tarde($dib_codigo, $usuario) {
        $this->sql = "SELECT adb.*, a.ALI_NOME, a.ALI_CALORIAS, db.*
                        FROM ALIMENTOS_DIARIOS_BORDO  adb, ALIMENTOS a, DIARIOS_BORDO db
                        WHERE 
                        adb.FK_DIARIOS_BORDO_DIB_CODIGO = '" . $dib_codigo . "' AND
                        db.DIB_CODIGO = '" . $dib_codigo . "' AND
                        adb.ALI_DIB_CODIGO_REFEICAO = '5' AND
                        db.FK_USUARIOS_USU_CODIGO = '".$usuario."' AND
                        adb.FK_ALIMENTOS_ALI_CODIGO = a.ALI_CODIGO;";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
    public function recuperar_jantar($dib_codigo, $usuario) {
        $this->sql = "SELECT adb.*, a.ALI_NOME, a.ALI_CALORIAS, db.*
                        FROM ALIMENTOS_DIARIOS_BORDO  adb, ALIMENTOS a, DIARIOS_BORDO db
                        WHERE 
                        adb.FK_DIARIOS_BORDO_DIB_CODIGO = '" . $dib_codigo . "' AND
                        db.DIB_CODIGO = '" . $dib_codigo . "' AND
                        adb.ALI_DIB_CODIGO_REFEICAO = '6' AND
                        db.FK_USUARIOS_USU_CODIGO = '".$usuario."' AND
                        adb.FK_ALIMENTOS_ALI_CODIGO = a.ALI_CODIGO;";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }
    public function recuperar_lanche_noite($dib_codigo, $usuario) {
        $this->sql = "SELECT adb.*, a.ALI_NOME, a.ALI_CALORIAS, db.*
                        FROM ALIMENTOS_DIARIOS_BORDO  adb, ALIMENTOS a, DIARIOS_BORDO db
                        WHERE 
                        adb.FK_DIARIOS_BORDO_DIB_CODIGO = '" . $dib_codigo . "' AND
                        db.DIB_CODIGO = '" . $dib_codigo . "' AND
                        adb.ALI_DIB_CODIGO_REFEICAO = '7' AND
                        db.FK_USUARIOS_USU_CODIGO = '".$usuario."' AND
                        adb.FK_ALIMENTOS_ALI_CODIGO = a.ALI_CODIGO;";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchAll();
    }

}

?>
