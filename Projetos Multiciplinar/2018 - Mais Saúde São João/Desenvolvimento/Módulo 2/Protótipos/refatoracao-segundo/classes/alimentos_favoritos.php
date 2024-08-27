<?php

class ALIMENTOS_FAVORITOS {

    private $FK_ALIMENTOS_ALI_CODIGO;
    private $FK_USUARIOS_USU_CODIGO;
    private $USU_ALI_CODIGO;
    
    function getFK_ALIMENTOS_ALI_CODIGO() {
        return $this->FK_ALIMENTOS_ALI_CODIGO;
    }

    function getFK_USUARIOS_USU_CODIGO() {
        return $this->FK_USUARIOS_USU_CODIGO;
    }

    function getUSU_ALI_CODIGO() {
        return $this->USU_ALI_CODIGO;
    }

    function setFK_ALIMENTOS_ALI_CODIGO($FK_ALIMENTOS_ALI_CODIGO) {
        $this->FK_ALIMENTOS_ALI_CODIGO = $FK_ALIMENTOS_ALI_CODIGO;
    }

    function setFK_USUARIOS_USU_CODIGO($FK_USUARIOS_USU_CODIGO) {
        $this->FK_USUARIOS_USU_CODIGO = $FK_USUARIOS_USU_CODIGO;
    }

    function setUSU_ALI_CODIGO($USU_ALI_CODIGO) {
        $this->USU_ALI_CODIGO = $USU_ALI_CODIGO;
    }
}

?>