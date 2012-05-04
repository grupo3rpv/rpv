<?php

class Application_Model_TipoSala extends Zend_Db_Table_Row_Abstract {

    public function getIdSala() {
        return $this->sala;
    }

    public function setIdSala($sala) {
        $this->sala = $sala;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}

