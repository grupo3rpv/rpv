<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Sessao
 *
 * @author Marcelo
 */
class Application_Model_Sessao {
   
    private $session;

    function __construct() {
        $this->session = new Zend_Session_Namespace('gestaodisponibilidade');
        if (!isset($this->session->disciplinas)) {
            $this->session->disciplinas = array();
        }
    }
    
     public function getDisciplinas() {
        return $this->session->disciplinas;
    }
    
    

    /**
     *
     * @param type $produtos 
     */
    public function setDisciplinas($disciplina) {
        $this->session->disciplinas = $disciplina;
    }
    

    public function addDisciplinas($disciplina){
        $this->session->disciplinas[]=$disciplina;
    }


}

?>
