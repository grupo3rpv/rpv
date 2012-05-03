<?php

class Application_Model_DbTable_Sala extends Zend_Db_Table_Abstract
{

    protected $_name = 'sala';
    protected $_rowClass = 'Application_Model_Sala';
    
    protected $_referenceMap = array(
        'SalaTipoSala' => array(
            'refTableClass' => 'Application_Model_DbTable_TipoSala',
            'columns' => array('id_categoria'),
            'refColumns' => 'id_categoria'
        )
       
    );
    
    
    
    public function cadastraSala($dados){
       $sala = $this->createRow();
      /* @var $sala Application_Model_Sala */
       $sala->setNumero($dados['numero']);
       $sala->setDescricao($dados['descricao']);
       $sala->setCapacidade($dados['capacidade']);
       $sala->setCapacidade_desc($dados['capacidade_desc']);
       $sala->setInfo_adicionais($dados['info_adicionais']);
       $sala->setStatus_disponibilidade($dados['status_disponibilidade']);
       $sala->setId_tipo_sala($dados['id_tipo_sala']);
       $sala->setResponsavel($dados['responsavel']);
       
       return $sala->save();
        
    }
    

    public function buscaPor($alias,$value)
     {
        $select = $this->select()->where($alias.' = ?', $value);
        return $this->fetchRow($select);
     }
     
     public function listaClientePor($alias,$value )
     {
        $select = $this->select()->where($alias.' = ?', $value);
        return $this->fetchAll($select);
     }
     
     public function editarSala($dados){
       $sala = $this->find($dados['numero'])->current();
      /* @var $sala Application_Model_Sala */
       //$sala->setNumero($dados['numero']);
       $sala->setDescricao($dados['descricao']);
       $sala->setCapacidade($dados['capacidade']);
       $sala->setCapacidade_desc($dados['capacidade_desc']);
       $sala->setInfo_adicionais($dados['info_adicionais']);
       $sala->setStatus_disponibilidade($dados['status_disponibilidade']);
       $sala->setId_tipo_sala($dados['id_tipo_sala']);
       $sala->setResponsavel($dados['responsavel']);
       
       return $sala->save();
        
    }
    
     public static function getPrimaryKeyName(){
        $class = get_called_class();
        $model = new $class;
        $info = $model->info();
        return $info['primary'][1];
    }
      
}

