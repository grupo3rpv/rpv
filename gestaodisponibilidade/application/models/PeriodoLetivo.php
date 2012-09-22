<?php

/**
 * Description of PeriodoLetivo
 *
 * @author thiago
 */
class Application_Model_PeriodoLetivo extends Zend_Db_Table_Row_Abstract {

    public function getId_periodo_letivo() {
        return $this->id_periodo_letivo;
    }

    public function setId_periodo_letivo($periodoLetivo) {
        $this->id_periodo_letivo = $periodoLetivo;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

}