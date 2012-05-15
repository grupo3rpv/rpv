<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Area
 *
 * @author Helison
 */
class Application_Model_DbTable_Area extends Zend_Db_Table_Abstract {

    protected $_name = 'area';
    protected $_rowClass = 'Application_Model_Area';

    public static function getValuesToSelectElement($order = 'descricao asc') {
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        $select = $model->select()->order($order);
        $result = $model->fetchAll($select);
        $resultArray = array();
        foreach ($result as $row):
            $resultArray[$row->$info['primary'][1]] = $row->nome;
        endforeach;
        return $resultArray;
    }

    public function listaAreaPor($value) {
        $select = $this->select()->order($value);
        return $this->fetchAll($select);
    }

    public function cadastraArea($dados) {
        $area = $this->createRow();

        $area->setId_area($dados['id_area']);
        $area->setDescricao($dados['descricao']);
        $area->setNome($dados['nome']);
        return $area->save();
    }

    public function editarArea(array $dados) {
        $area = $this->find($dados['id_area'])->current();
        $area->setNome($dados['nome']);
        $area->setDescricao($dados['descricao']);

        return $area->save();
    }

    public function removerArea($id_area) {
        $area = $this->find($id_area)->current();
        return $area->delete();
    }

    public static function getPrimaryKeyName() {
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        return $info['primary'][1];
    }
    
    public function getIdsENomesTodasAreas() {
        $areas = $this->listaAreaPor('nome asc');
        $lista = array();
        foreach ($areas as $item) {
            $lista[$item['id_area']] = $item['nome'];
        }
        return $lista;
    }
    
    public function getArea($idArea) {
        return $this->find($idArea)->current();
    }

}
