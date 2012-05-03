<?php

class Application_Model_EquipamentoSala extends Zend_Db_Table_Row_Abstract
{
  

    
    public function getId_equipamento() {
        return $this->id_equipamento;
    }

    public function setId_equipamento($id_equipamento) {
        $this->id_equipamento = $id_equipamento;
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

