<?php

class Application_Model_DbTable_DisciplinaCurso extends Zend_Db_Table_Abstract {

    protected $_name = 'disciplina_curso';
    protected $_rowClass = 'Application_Model_DisciplinaCurso';
    protected $_primary = array('id_curso', 'id_disciplina');
    protected $_dependentTables = array('Application_Model_DbTable_Curso', 'Application_Model_DbTable_Disciplina');

    public function getIdDisciplinas($idCurso) {
        $select = $this->select()->where('id_curso = ?', $idCurso);
        return $this->fetchAll($select);
    }

    public function getIdCursos($idDisciplina) {
        $select = $this->select()->where('id_disciplina = ?', $idDisciplina);
        return $this->fetchAll($select);
    }

    public function cadastraDisciplinaCurso($dados) {
        $disciplinaCurso = $this->createRow();
        $disciplinaCurso->setId_disciplina_curso($dados['id_disciplina_curso']);
        $disciplinaCurso->setId_curso($dados['id_curso']);
        $disciplinaCurso->setId_disciplina($dados['id_disciplina']);
        return $disciplinaCurso->save();
    }
    
    public function removerCursosDaDisciplina($idDisciplina) {
        $cursos = $this->getIdCursos($idDisciplina);
        for ($i = 0; $i < count($cursos); $i++) {
            $cursos->getRow($i)->delete();
        }
    }
    
    public function getDisciplinaCurso($idCurso, $idDisciplina) {
        $select = $this->select()->where('id_curso = ?', $idCurso)->where('id_disciplina = ?', $idDisciplina);
        return $this->fetchAll($select);
    }

}
