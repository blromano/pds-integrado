<?php

class fichas_de_treinamento_dao {

    function select(Database $conexao, fichas_de_treinamento $fichas_de_treinamento) {

        $query = "INSERT INTO FICHAS_DE_TREINAMENTO (fic_codigo, fic_dia_semana, fic_quantidade, fic_series, fic_repeticoes, fic_nome_atividades, fic_data_inicio, fic_data_termino) "
                . "VALUES ('{$fichas_de_treinamento->getfic_codigo()}', '{$fichas_de_treinamento->getfic_dia_semana()}', '{$fichas_de_treinamento->getfic_quantidade()}', '{$fichas_de_treinamento->getfic_series()}', '{$fichas_de_treinamento->getfic_repeticoes()}', '{$fichas_de_treinamento->getfic_nome_atividades()}', '{$fichas_de_treinamento->getfic_data_inicio()}', '{$fichas_de_treinamento->getfic_data_termino()}')";
        mysqli_query($conexao->conecta(), $query);
    }

}

?>
