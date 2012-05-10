<?php

class Application_Model_DbTable_TipoSala extends Zend_Db_Table_Abstract {

    protected $_name = 'tipo_sala';
    protected $_rowClass = 'Application_Model_TipoSala';

    /**
     * 
     * @param type $order
     * @return type 
     */
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

    public function listaTipoSalaPor($value) {
        $select = $this->select()->order($value);
        return $this->fetchAll($select);
    }
    
     public function cadastraTipoSala($dados) {
        $tipoSala = $this->createRow();

        $tipoSala->setId_tipo_sala($dados['id_tipo_sala']);
        $tipoSala->setDescricao($dados['descricao']);

        return $tipoSala->save();
    }

    public function editarTipoSala(array $dados) {
        $tipoSala = $this->find($dados['id_tipo_sala'])->current();
        $tipoSala->setDescricao($dados['descricao']);

        return $tipoSala->save();
    }
    /**
     * 
     * @return string
     */
    public static function getPrimaryKeyName() {
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        return $info['primary'][1];
    }

    public function removerTipoSala($id_tipo_sala) {
        $tipoSala = $this->find($id_tipo_sala)->current();
        return $tipoSala->delete();
    }

}

