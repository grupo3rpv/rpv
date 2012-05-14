<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Professor
 *
 * @author Helison
 */
class Application_Model_Professor extends Application_Model_Usuario{
    
    public function getMatricula(){
        
        return $this->matricula;
    }
    public function setMatricula($matricula){
        $this->matricula = $matricula;
   
    }
        public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

}
