<?php

class Application_Model_DisciplinaCurso extends Zend_Db_Table_Row_Abstract {
    
    private $disciplina;
    
    public function getDisciplina() {
        if (is_null($this->disciplina)) {
            $disciplinaDAO = new Application_Model_DbTable_Disciplina();
            $this->disciplina = $disciplinaDAO->find($this->id_disciplina)->current();
        }
        return $this->disciplina;
    }

    public function getId_curso() {
        return $this->id_curso;
    }

    public function setId_curso($id_curso) {
        $this->id_curso = $id_curso;
    }

    public function getId_disciplina() {
        return $this->id_disciplina;
    }

    public function setId_disciplina($id_disciplina) {
        $this->id_disciplina = $id_disciplina;
    }

    public function getId_disciplina_curso() {
        return $this->id_disciplina_curso;
    }

    public function setId_disciplina_curso($id_disciplina_curso) {
        $this->id_disciplina_curso = $id_disciplina_curso;
    }

}