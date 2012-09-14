<?php

/**
 * Description of Area
 *
 * @author Marcelo
 */
class Application_Model_EventoUsuario extends Zend_Db_Table_Row_Abstract {
 
   
    public function getId_evento() {
        return $this->id_evento;
    }

    public function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }

    public function getId_professor() {
        return $this->id_professor;
    }

    public function setId_professor($id_professor) {
        $this->id_professor = $id_professor;
    }

    public function getConvite() {
        return $this->convite;
    }

    public function setConvite($convite) {
        $this->convite = $convite;
    }


    
    
}
