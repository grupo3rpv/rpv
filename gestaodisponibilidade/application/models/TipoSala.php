<?php

class Application_Model_TipoSala extends Zend_Db_Table_Row_Abstract {

    public function getId_tipo_sala() {
        return $this->id_tipo_sala;
    }

    public function setId_tipo_sala($sala) {
        $this->id_tipo_sala = $sala;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}

