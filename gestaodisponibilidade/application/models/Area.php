<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Area
 *
 * @author Helison
 */
class Application_Model_Area extends Zend_Db_Table_Row_Abstract {

    public function getId_area() {
        return $this->id_area;
    }

    public function setId_area($id_area) {
        $this->id_area = $id_area;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getDescricao() {
        return $this->descricao;
    }

    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }

}
