<?php

class AgendaController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $id_professor = '1';
        $modelProfessor = new Application_Model_DbTable_Professor();
        $professor = $modelProfessor->find($id_professor)->current();
        $modelEvento = new Application_Model_DbTable_Evento();
        $listaEventos = $modelEvento->getNomePorIdProfessor('1');
        $this->view->listaEventos = $listaEventos;
        $this->view->professor = $professor;
    }
    public function addEventoAction() {
       if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getParams();
          
               
                $modelEvento = new Application_Model_DbTable_Evento();
                unset($dados['controller']);
                unset($dados['action']);
                unset($dados['module']);
                $dados['id_professor']='1';
                $modelEvento->cadastraEvento($dados); 

                
               $this->_redirect('/agenda/index');
               
            }
        
    }
     public function cadastrarEventoAction() {
        
    }
}