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
    public function setEmenta($ementa){
        $this->ementa = $ementa;
    }
    public function getCarga_horaria(){
        return $this->carga_horaria;
    }
    public function setCarga_horaria($carga_horaria){
        $this->carga_horaria = $carga_horaria;
    }
    public function getInfo_adicionais(){
        return $this->info_adicionais;
    }
    public function setinfo_adicionais($info_adicionais){
        $this->info_adicionais = $info_adicionais;
    }
    
    
}

?>
