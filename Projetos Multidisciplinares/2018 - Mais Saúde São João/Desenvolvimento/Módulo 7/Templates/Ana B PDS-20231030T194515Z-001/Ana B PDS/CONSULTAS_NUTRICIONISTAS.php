<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
require_once 'Conexao.php';

class CONSULTAS_NUTRICIONISTAS {

    private $conexao;
    private $sql;
    private $usuario;
    private $resultado;
    private $tabela;

    public function __construct() {
        $conn = new Conexao();
        $this->cenexao = $conn->getConexao();
        $this->tabela = "CONSULTAS_NUTRICIONISTAS";
    }

    public function listarTodos() {
        $this->sql = "select * from $this->tabela";
        $this->resultado = $this->conexao->prepare($this->sql);
        $this->resultado->execute();
        return $this->resultado->fetchALL();
    }

    public function Excluir($id) {
        $sql = "DELETE FROM $this->tabela WHERE ID = :ID";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':ID', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function Insert($CNT_CODIGO, $CNT_DATA, $CNT_HORA_CONSULTA, $CNT_STATUS) {
        $sql = "INSERT INTO $this->tabela( CNT_CODIGO, CNT_DATA, CNT_HORA_CONSULTA, CNT_STATUS) 
         VALUES( :CNT_CODIGO, :CNT_DATA, :CNT_HORA_CONSULTA, :CNT_STATUS)";
   
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':CNT_CODIGO', $CNT_CODIGO, PDO::PARAM_STR);
        $stmt->bindParam(':CNT_DATA', $CNT_DATA, PDO::PARAM_STR);
        $stmt->bindParam(':CNT_HORA_CONSULTA', $CNT_HORA_CONSULTA, PDO::PARAM_STR);
        $stmt->bindParam(':CNT_STATUS', $CNT_STATUS, PDO::PARAM_STR);
        $stmt->execute ();
        
    }
public function Update($CNT_CODIGO, $CNT_DATA, $CNT_HORA_CONSULTA, $CNT_STATUS) {

    $sql = "UPDATE $this->tabela SET 
        CNT_CODIGO =:CNT_CODIGO,
        CNT_DATA =:CNT_DATA,
        CNT_HORA_CONSULTA =:CNT_HORA_CONSULTA,
        CNT_STATUS =:CNT_STATUS";
    $stmt = $pdo->prepare($sql);
    $stmt->binParam(':CNT_CODIGO', $CNT_CODIGO, PDO::PARAM_STR);
    $stmt->binParam(':CNT_DATA', $CNT_DATA, PDO::PARAM_STR);
    $stmt->binParam(':CNT_HORA_CONSULTA', $CNT_HORA_CONSULTA, PDO::PARAM_STR);
    $stmt->binParam(':CNT_STATUS', $CNT_STATUS, PDO::PARAM_STR);
    $stmt->execute();     
}      
}
?>

