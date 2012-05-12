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

    public function cadastraDisciplinaCurso($dados) {
        $disciplinaCurso = $this->createRow();
        $disciplinaCurso->setId_disciplina_curso($dados['id_disciplina_curso']);
        $disciplinaCurso->setId_curso($dados['id_curso']);
        $disciplinaCurso->setId_disciplina($dados['id_disciplina']);
        return $disciplinaCurso->save();
    }

}
