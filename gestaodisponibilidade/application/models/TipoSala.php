<?php

class Application_Model_TipoSala extends Zend_Db_Table_Row_Abstract {

    public function getId_sala() {
        return $this->sala;
    }

    public function setId_sala($sala) {
        $this->sala = $sala;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}

