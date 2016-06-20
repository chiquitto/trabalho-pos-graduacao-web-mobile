<?php

class Application_Model_Vo_Estado{
    
    private $idestado;
    private $sigla_estado;
    private $estado;
    
    function getIdestado() {
        return $this->idestado;
    }

    function getSiglaEstado() {
        return $this->sigla_estado;
    }
    
    function getEstado() {
        return $this->estado;
    }

    function setIdestado($idestado) {
        $this->idestado = $idestado;
    }
    
    function setSiglaEstado($sigla_estado) {
        $this->sigla_estado = $sigla_estado;
    }
    
    function setEstado($estado) {
        $this->estado = $estado;
    }

}