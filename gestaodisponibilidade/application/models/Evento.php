<?php

/**
 * Description of Area
 *
 * @author Marcelo
 */
class Application_Model_Evento extends Zend_Db_Table_Row_Abstract {

   
    
    public function getPrivado() {
        return $this->privado;
    }

    public function setPrivado($privado) {
        $this->privado = $privado;
    }

     public function getId_evento() {
        return $this->id_evento;
    }

    public function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }

    public function getData_inicial() {
        return $this->data_inicial;
    }

    public function setData_inicial($data_inicial) {
        $data = $data_inicial;
        list($mes, $dia, $ano) = explode('/', $data, 3);
        $this->data_inicial = $ano . '-' . $mes . '-' . $dia;
    }

    public function getData_final() {
        return $this->data_final;
    }

    public function setData_final($data_final) {
        $data = $data_final;
        list($mes, $dia, $ano) = explode('/', $data);
        $this->data_final = $ano . '-' . $mes . '-' . $dia;
    }

    public function getHora1() {
        return $this->hora1;
    }

    public function setHora1($hora1) {
        $this->hora1 = $hora1;
    }

    public function getHora2() {
        return $this->hora2;
    }

    public function setHora2($hora2) {
        $this->hora2 = $hora2;
    }

    public function getTitulo() {
        return $this->titulo;
    }

    public function setTitulo($titulo) {
        $this->titulo = $titulo;
    }
}
