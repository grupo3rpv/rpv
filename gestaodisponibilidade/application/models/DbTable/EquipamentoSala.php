<?php

class Application_Model_DbTable_EquipamentoSala extends Zend_Db_Table_Abstract {

    protected $_name = 'equipamento_sala';
    protected $_rowClass = 'Application_Model_EquipamentoSala';
    protected $_referenceMap = array(
        'SalaEquipamentoSala' => array(
            'refTableClass' => 'Application_Model_DbTable_Sala',
            'columns' => array('numero'),
            'refColumns' => 'numero_sala'
        )
    );

    public function cadastraEquipamentoSala(array $dados) {
        $equipamentoSala = $this->createRow();

        $equipamentoSala->setId_equipamento_sala($dados['id_equipamento_sala']);
        $equipamentoSala->setNumero_sala($dados['numero_sala']);
        $equipamentoSala->setQuantidade($dados['quantidade']);

        return $equipamentoSala->save();
    }

    public function editaEquipamentoSala(array $dados) {
        $equipamentoSala = $this->find(array($dados['id_equipamento_sala'], $dados['numero_sala']))->current();

        $equipamentoSala->setId_equipamento_sala($dados['id_equipamento_sala']);
        $equipamentoSala->setNumero_sala($dados['numero_sala']);
        $equipamentoSala->setQuantidade($dados['quantidade']);

        return $equipamentoSala->save();
    }

    public function getEquipamentosSala($numero_sala) {
        $select = $this->select()->where('numero_sala = ?', $numero_sala);
        return $this->fetchAll($select);
    }
    
    public function removerEquipamentoSala($idEquipamentoSala, $numeroSala) {
        $equipamentoSala = $this->find(array($idEquipamentoSala, $numeroSala))->current();
        return $equipamentoSala->delete();
    }
    
    public function removerEquipamentosDaSala($numeroSala) {
        $equipamentos = $this->getEquipamentosSala($numeroSala);
        for ($i = 0; $i < count($equipamentos); $i++) {
            $equipamentos->getRow($i)->delete();
        }
    }
    
    public function removerSalasDoEquipamento($idEquipamento) {
        $where = $this->getAdapter()->quoteInto('id_equipamento_sala = ?', $idEquipamento);
        return $this->delete($where);
    }

}
