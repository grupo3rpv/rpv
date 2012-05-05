<?php

class Application_Model_EquipamentoSala extends Zend_Db_Table_Row_Abstract {
    
    

    public function getId_equipamento_sala() {
        return $this->id_equipamento_sala;
    }

    public function setId_equipamento_sala($id_equipamento) {
        $this->id_equipamento_sala = $id_equipamento;
    }

    public function getNumero_sala() {
        return $this->numero_sala;
    }

    public function setNumero_sala($numero_sala) {
        $this->numero_sala = $numero_sala;
    }

    public function getQuantidade() {
        return $this->quantidade;
    }

    public function setQuantidade($quantidade) {
        $this->quantidade = $quantidade;
    }

}

