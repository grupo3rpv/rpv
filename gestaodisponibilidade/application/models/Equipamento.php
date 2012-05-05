<?php

class Application_Model_Equipamento extends Zend_Db_Table_Row_Abstract {

    public function getId_equipamento() {
        return $this->id_equipamento;
    }

    public function setId_equipamento($id_equipamento) {
        $this->id_equipamento = $id_equipamento;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}

