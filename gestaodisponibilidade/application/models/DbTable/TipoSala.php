<?php

class Application_Model_DbTable_TipoSala extends Zend_Db_Table_Abstract
{

    protected $_name = 'tipo_sala';
    protected $_rowClass= 'Application_Model_TipoSala';



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
    
    /**
     * 
     * @return string
     */
    public static function getPrimaryKeyName(){
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        return $info['primary'][1];
    }
    
}
