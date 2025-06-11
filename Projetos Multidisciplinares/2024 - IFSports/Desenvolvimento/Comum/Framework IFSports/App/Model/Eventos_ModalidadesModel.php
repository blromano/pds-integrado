<?php

    namespace App\Model;

    class Eventos_ModalidadesModel{
        private $EVM_ID;
        private $EVM_QUANTIDADE_MAXIMA_JOGADORES;
        private $EVM_QUANTIDADE_MINIMA_JOGADORES;
        private $EVM_VINCULADA_EVENTO;
        private $FK_EVENTOS_EVO_ID;
        private $FK_MODALIDADES_MDE_ID;

       // retirar, pois foi criado uma nova entidade
       private $FK_RESPONSAVEIS_EQUIPE_RES_ID;

        // Atributos não fazem parte do BD (Entidade), mas são necessários na listagem de modalidades de eventos
        private $MDE_ID;
        private $MDE_NOME;
        private $MDE_TIPO;
        private $MDE_GENERO;
        private $EVO_NOME;

        public function __set($nome, $valor){
            $this->$nome = $valor;
        }

        public function __get($nome){
            return $this->$nome;
        }
    }