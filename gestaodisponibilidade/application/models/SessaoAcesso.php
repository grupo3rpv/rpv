<?php

class Application_Model_SessaoAcesso extends Zend_Db_Table_Row_Abstract
{

         
     private $session;
     
      function __construct() {
        $this->session = new Zend_Session_Namespace('acesso');
        if (!isset($this->session->dados)) {
            $this->session->dados = array();
        }
    }
    
     public function getSession() {
         return $this->session->dados;
     }

     public function inserirDados($dados){
           
           $this->session->dados = $dados; 
     }
     
     





}

