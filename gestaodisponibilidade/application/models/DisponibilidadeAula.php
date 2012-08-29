<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Area
 *
 * @author Bruno
 */
class Application_Model_DisponibilidadeAula extends Zend_Db_Table_Row_Abstract {


    
    public function getId_disponibilidade_aula() {
        return $this->id_disponibilidade_aula;
    }

    public function setId_disponibilidade_aula($id_disponibilidade_aula) {
        $this->id_disponibilidade_aula = $id_disponibilidade_aula;
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getDia() {
        return $this->dia;
    }

    public function setDia($dia) {
        $this->dia = $dia;
    }

    public function getHora() {
        return $this->hora;
    }

    public function setHora($hora) {
        $this->hora = $hora;
    }


    
}
