<?php

class Application_Model_DbTable_Equipamento extends Zend_Db_Table_Abstract {

    protected $_name = 'equipamento';
    protected $_rowClass = 'Application_Model_Equipamento';

    public function listarTodos() {
        $select = $this->select()->order('descricao asc');
        return $this->fetchAll($select);
    }

    public function listaEquipamentosPor($value) {
        $select = $this->select()->order($value);
        return $this->fetchAll($select);
    }
    
     public function getDescricaoPorId($id) {
        $select = $this->select()->where('id_equipamento = ?', $id);
        return $this->fetchRow($select);
    }

    public static function getPrimaryKeyName() {
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        return $info['primary'][1];
    }

    public static function getValuesToSelectElement($order = 'descricao asc') {
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        $select = $model->select()->order($order);
        $result = $model->fetchAll($select);
        $resultArray = array();
        foreach ($result as $row):
            $resultArray[$row->$info['primary'][1]] = $row->descricao;
        endforeach;
        return $resultArray;
    }

    public function cadastraEquipamento($dados) {
        $equipamento = $this->createRow();

        $equipamento->setId_equipamento($dados['id_equipamento']);
        $equipamento->setDescricao($dados['descricao']);

        return $equipamento->save();
    }

    public function editarEquipamento(array $dados) {
        $equipamento = $this->find($dados['id_equipamento'])->current();
        $equipamento->setDescricao($dados['descricao']);

        return $equipamento->save();
    }
    
    public function removerEquipamento($idEquipamento) {
        $equipamentoSala = new Application_Model_DbTable_EquipamentoSala();
        $linhasDeletadas = $equipamentoSala->removerSalasDoEquipamento($idEquipamento);
            $equipamento = $this->find($idEquipamento)->current();
            return $equipamento->delete();
       
    }
}

