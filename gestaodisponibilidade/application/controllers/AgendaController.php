<?php

class AgendaController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $id_professor = '1';
        $arrayEventos = array();
        $modelProfessor = new Application_Model_DbTable_Professor();
        $professor = $modelProfessor->find($id_professor)->current();
        $modelEvento = new Application_Model_DbTable_Evento();
        $listaEventos = $modelEvento->listaEventosPorIdProfessor('1');

        foreach ($listaEventos as $value) {

            $arrayEventos['dataInicial'][] = $value['data_inicial'];
            $arrayEventos['dataFinal'][] = $value['data_inicial'];
            $arrayEventos['hora1'][] = $value['hora1'];
            $arrayEventos['hora2'][] = $value['hora2'];
            $arrayEventos['titulo'][] = $value['titulo'];
            $arrayEventos['id_evento'][] = $value['id_evento'];
        }
        $this->view->listaEventos = $arrayEventos;
        $this->view->professor = $professor;
    }

    public function addEventoAction() {
        if ($this->getRequest()->isPost()) {
            $dados = $this->getRequest()->getParams();
            $modelEvento = new Application_Model_DbTable_Evento();
            unset($dados['controller']);
            unset($dados['action']);
            unset($dados['module']);
            $dados['id_professor'] = '1';

            $modelEvento->cadastraEvento($dados);
            $this->_redirect('/agenda/index');
        }
    }

     public function cadastrarEventoAction() {
       $professores = new Application_Model_DbTable_Professor();
       $listaDeProfessores = $professores->listaUsuario();
       $this->view->professores = $listaDeProfessores;


     }
}