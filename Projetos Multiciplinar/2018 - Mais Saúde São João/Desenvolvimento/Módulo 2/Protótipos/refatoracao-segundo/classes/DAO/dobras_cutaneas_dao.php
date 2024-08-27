<?php
include'dobras_cutaneas';

class dobras_cutaneas_dao{
     
    function selecionar($dobras_cutaneas) {
        $sqlUsuario = $conexao->prepare("SELECT * FROM DOBRAS_CUTANEAS");
        $sqlUsuario->execute();
        $resultado = $sqlUsuario->fetchAll();
    }
    function inserir($dobras_cutaneas) {
        $consulta = $conexao->prepare("INSERT INTO DOBRAS_CUTANEAS(DBC_CODIGO DOB_TRICIPTAL, DBC_SUBESCAPULAR, DBC_BICIPTAL, DBC_SUPRA_ILIACA, DBC_TORAXICA, DBC_ABDOMINAL, DBC_COXA, DBC_PANTURRILHA_MEDIA) " . "VALUES (:dbc_codigo dbc_triciptal, :dbc_subescapular, :dbc_biciptal, :dbc_supra_iliaca, :dbc_abdominal, :dbc_abdominal, :dbc_coxa, :dbc_panturrilha_media");
        $consulta->bindParam(':dbc_codigo', $dbc_codigo);
        $consulta->bindParam(':dbc_triciptal', $dbc_triciptal);
        $consulta->bindParam(':dbc_sepercapular', $dbc_sebescapular);
        $consulta->bindParam(':dbc_biciptal', $dbc_biciptal);
        $consulta->bindParam(':dbc_supra_iliaca', $dbc_supra_iliaca);
        $consulta->bindParam(':dbc_abdominal', $dbc_abdominal);
        $consulta->bindParam(':dbc_coxa', $dbc_coxa);
        $consulta->bindParam(':dbc_panturrilha_media', $dbc_panturrilha_media);
        $dob_codigo = $dobras_cutaneas->dob_codigo();
        $consulta->execute();
        header("location:");
    }

    function atualizar($dobras_cutaneas) {
        $sqlUsuario = $conexao->prepare("UPDATE DOBRAS_CUTANEAS SET DBC_CODIGO = :dbc_codigo,DBC_TRICIPTAL= :dbc_triciptal, DBC_SUBESCAPULAR= :dbc_subescapular, DBC_BICIPTAL= :dbc_biciptal, DBC_SUPRA_ILIACA= :dbc_supra_iliaca, DBC_TORAXICA= :dbc_abdominal, DBC_ABDOMINAL= :dbc_abdominal,DBC_COXA= :dbc_coxa, DBC_PANTURRILHA_MEDIA= :dbc_panturrilha_media WHERE DBC_CODIGO = :dbc_codigo");
        $consulta->bindParam(':dbc_codigo', $dbc_codigo);
        $consulta->bindParam(':dbc_triciptal', $dbc_triciptal);
        $consulta->bindParam(':dbc_sepercapular', $dbc_sebescapular);
        $consulta->bindParam(':dbc_biciptal', $dbc_biciptal);
        $consulta->bindParam(':dbc_supra_iliaca', $dbc_supra_iliaca);
        $consulta->bindParam(':dbc_abdominal', $dbc_abdominal);
        $consulta->bindParam(':dbc_coxa', $dbc_coxa);
        $consulta->bindParam(':dbc_panturrilha_media', $dbc_panturrilha_media);
        $dob_codigo = $dobras_cutaneas->getdob_codigo();
        $dob_codigo = $dobras_cutaneas->getdob_codigo();
        $sqlUsuario->execute();
        header("location:");
    }

    function excluir($dobras_cutaneas) {
        $sqlUsuario = $conexao->prepare("DELETE FROM DOBRAS_CUTANEAS WHERE DBC_CODIGO = :dbc_codigo");
        $sqlUsuario->bindParam(":dbc_codigo", $_GET["dbc_codigo"]);
        $sqlUsuario->execute();
    }
}
?>
