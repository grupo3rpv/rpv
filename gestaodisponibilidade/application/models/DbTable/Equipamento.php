<?php

class Application_Model_DbTable_Equipamento extends Zend_Db_Table_Abstract
{

    protected $_name = 'equipamento';
    protected $rowClass = 'Application_Model_Equipamento';
  
    public function listarTodos(){
     
        $select = $this->select()->order('descricao asc');
        return $this->fetchAll($select);
     }

      public static function getPrimaryKeyName(){
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        return $info['primary'][1];
    }
    
     public static function getValuesToSelectElement($order = 'descricao asc'){
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        $select = $model->select()->order($order);
        $result = $model->fetchAll($select);
        $resultArray = array();
        foreach($result as $row):
            $resultArray[$row->$info['primary'][1]] = $row->descricao;
        endforeach;
        return $resultArray;
    }
            
    

}

