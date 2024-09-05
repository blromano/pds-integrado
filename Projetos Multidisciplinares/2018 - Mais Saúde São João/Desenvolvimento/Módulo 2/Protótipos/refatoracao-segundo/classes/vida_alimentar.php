<?php

class VIDA_ALIMENTAR {
    
    private $VAL_INDICE_CARBOIDRATOS;
    private $VAL_INDICE_PROTEINAS;
    private $VAL_INDICE_VITAMINAS;
    private $VAL_META;
    private $VAL_INDICE_CALORIAS;
    private $VAL_INDICE_GORDURA;
    private $VAL_INDICE_NUTRIENTES;
    private $FK_USUARIOS_USU_CODIGO;
    private $FK_NUTRICIONISTAS_FK_USUARIOS_USU_CODIGO;
    private $VAL_CODIGO;
    
    

    function getVAL_CODIGO() {
        return $this->VAL_CODIGO;
    }

    function setVAL_CODIGO($VAL_CODIGO) {
        $this->VAL_CODIGO = $VAL_CODIGO;
    }

    function getVAL_INDICE_CARBOIDRATOS() {
        return $this->VAL_INDICE_CARBOIDRATOS;
    }

    function getVAL_INDICE_PROTEINAS() {
        return $this->VAL_INDICE_PROTEINAS;
    }

    function getVAL_INDICE_VITAMINAS() {
        return $this->VAL_INDICE_VITAMINAS;
    }

    function getVAL_META() {
        return $this->VAL_META;
    }

    function getVAL_INDICE_CALORIAS() {
        return $this->VAL_INDICE_CALORIAS;
    }

    function getVAL_INDICE_GORDURA() {
        return $this->VAL_INDICE_GORDURA;
    }

    function getVAL_INDICE_NUTRIENTES() {
        return $this->VAL_INDICE_NUTRIENTES;
    }

    function getFK_USUARIOS_USU_CODIGO() {
        return $this->FK_USUARIOS_USU_CODIGO;
    }

    function getFK_NUTRICIONISTAS_FK_USUARIOS_USU_CODIGO() {
        return $this->FK_NUTRICIONISTAS_FK_USUARIOS_USU_CODIGO;
    }

    function setVAL_INDICE_CARBOIDRATOS($VAL_INDICE_CARBOIDRATOS) {
        $this->VAL_INDICE_CARBOIDRATOS = $VAL_INDICE_CARBOIDRATOS;
    }

    function setVAL_INDICE_PROTEINAS($VAL_INDICE_PROTEINAS) {
        $this->VAL_INDICE_PROTEINAS = $VAL_INDICE_PROTEINAS;
    }

    function setVAL_INDICE_VITAMINAS($VAL_INDICE_VITAMINAS) {
        $this->VAL_INDICE_VITAMINAS = $VAL_INDICE_VITAMINAS;
    }

    function setVAL_META($VAL_META) {
        $this->VAL_META = $VAL_META;
    }

    function setVAL_INDICE_CALORIAS($VAL_INDICE_CALORIAS) {
        $this->VAL_INDICE_CALORIAS = $VAL_INDICE_CALORIAS;
    }

    function setVAL_INDICE_GORDURA($VAL_INDICE_GORDURA) {
        $this->VAL_INDICE_GORDURA = $VAL_INDICE_GORDURA;
    }

    function setVAL_INDICE_NUTRIENTES($VAL_INDICE_NUTRIENTES) {
        $this->VAL_INDICE_NUTRIENTES = $VAL_INDICE_NUTRIENTES;
    }

    function setFK_USUARIOS_USU_CODIGO($FK_USUARIOS_USU_CODIGO) {
        $this->FK_USUARIOS_USU_CODIGO = $FK_USUARIOS_USU_CODIGO;
    }

    function setFK_NUTRICIONISTAS_FK_USUARIOS_USU_CODIGO($FK_NUTRICIONISTAS_FK_USUARIOS_USU_CODIGO) {
        $this->FK_NUTRICIONISTAS_FK_USUARIOS_USU_CODIGO = $FK_NUTRICIONISTAS_FK_USUARIOS_USU_CODIGO;
    }



    
    
}