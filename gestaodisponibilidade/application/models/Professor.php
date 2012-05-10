<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Professor
 *
 * @author Helison
 */
class Application_Model_Professor extends Zend_Db_Table_Row_Abstract {
    
    public function getId_professor() {
        return $this->id_professor;
    }

    public function setId_professor($id_professor) {
        $this->id_professor = $id_professor;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function getMatricula(){
        return $this->matricula;
    }
    public function setMatricula($matricula){
        $this->matricula = $matricula;
   
    }
}

?>
