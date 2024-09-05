<?php
    namespace App\Model; 

    class DenunciaModel{

        private $DEN_ID;
        private $DEN_TITULO;
        private $DEN_DESCRICAO;
        private $DEN_FOTO_VIDEO;
        private $DEN_DATA_PUBLICACAO;
        private $DEN_STATUS_DENUNCIA;
        private $DEN_DATA_ALT_STATUS;
        private $DEN_CEP;
        private $DEN_RUA;
        private $DEN_NUMERO;
        private $DEN_COMPLEMENTO;
        private $DEN_BAIRRO;
        private $DEN_QDE_CURTIDAS;
        private $FK_CIDADAOS_USU_ID;
        private $FK_GESTORES_USU_ID;
        private $FK_SETORES_SET_ID;

        public function __get($name) {
            return $this->$name;
        }

        public function __set($name, $value) {
            $this->$name = $value;
        }        

    }
?>