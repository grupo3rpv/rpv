<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Disciplina
 *
 * @author Helison
 */
class Application_Model_Disciplina extends Zend_Db_Table_Row_Abstract {

    public function getId_disciplina() {
        return $this->id_disciplina;
    }

    public function setId_disciplina($id_disciplina) {
        $this->id_disciplina = $id_disciplina;
    }

    public function getCodigo() {
        return $this->codigo;
    }

    public function setCodigo($codigo) {
        $this->codigo = $codigo;
    }
        public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }
    
    public function getEmenta(){
        return $this->ementa;
    }
    public function setEmanta($ementa){
        $this->ementa = $ementa;
    }
    public function getCargaHoraria(){
        return $this->cargaHoraria;
    }
    public function setCargaHoraria($cargaHoraria){
        $this->cargaHoraria = $cargaHoraria;
    }
    public function getInfoAdicionais(){
        return $this->infoAdicionais;
    }
    public function setinfoAdicionais($infoAdicionais){
        $this->infoAdicionais = $infoAdicionais;
    }
    
    
}

?>
