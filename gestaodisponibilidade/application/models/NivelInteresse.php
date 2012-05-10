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
class NivelInteresse {

    public function getId_nivelInteresse() {
        return $this->id_nivelInteresse;
    }

    public function setId_nivelInteresse($id_nivelInteresse) {
        $this->id_nivelInteresse = $id_nivelInteresse;
    }

    public function getId_professor() {
        return $this->id_professor;
    }

    public function setId_professor($id_professor) {
        $this->id_professor = $id_professor;
    }

    public function getNivelInteresse() {
        return $this->nivelInteresse;
    }

    public function setNivelInteresse($nivelInteresse) {
        $this->nivelInteresse = $nivelInteresse;
    }

}

?>
