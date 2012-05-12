<?php

class Application_Model_DbTable_DisciplinaCurso extends Zend_Db_Table_Abstract {

    protected $_name = 'disciplina_curso';
    protected $_rowClass = 'Application_Model_DisciplinaCurso';
    protected $_primary = array('id_curso','id_disciplina');
    protected $_dependentTables = array('curso','disciplina'); 
    
   
    public function getIdDisciplinas($id){
       $select = $this->select()->where('id_curso =?',$id); 
       return $this->fetchAll($select);
        
    }

    

}
