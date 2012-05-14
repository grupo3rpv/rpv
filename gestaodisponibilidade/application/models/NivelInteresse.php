<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of NivelInteresse
 *
 * @author Helison
 */
class Application_Model_NivelInteresse extends Zend_Db_Table_Row_Abstract {

    public function getId_nivelInteresse() {
        return $this->id_nivel_interesse;
    }

    public function setId_nivelInteresse($id_nivel_interesse) {
        $this->id_nivel_interesse = $id_nivel_interesse;
    }

    public function getId_professor() {
        return $this->id_professor;
    }

    public function setId_professor($id_professor) {
        $this->id_professor = $id_professor;
    }
  
    public function getNivelInteresse() {
        return $this->nivel_interesse;
    }

    public function setNivelInteresse($nivelInteresse) {
        $this->nivel_interesse = $nivelInteresse;
    }

     public function getId_disciplina() {
        return $this->id_disciplina;
    }

    public function setId_disciplina($id_disciplina) {
        $this->id_disciplina = $id_disciplina;
    }

}