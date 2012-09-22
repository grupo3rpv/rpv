<?php

/**
 * Description of Turma
 *
 * @author thiago
 */
class Application_Model_Turma extends Zend_Db_Table_Row_Abstract {
    
    public function getId_turma() {
        return $this->id_turma;
    }
    
    public function setId_turma($idTurma) {
        $this->id_turma = $idTurma;
    }
    
    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    
}