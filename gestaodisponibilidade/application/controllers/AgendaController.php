<?php

class AgendaController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        
    }
    public function addEventoAction() {
       if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getParams();
          
                var_dump($dados);die();

                $model = new Application_Model_DbTable_Curso();
                $model->cadastraCurso($dados);

                $this->_redirect('/agenda/index');
            }
        
    }
     public function cadastrarEventoAction() {
        
    }
}