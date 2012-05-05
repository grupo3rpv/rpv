<?php

class EquipamentoController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $modelEquipamento = new Application_Model_DbTable_Equipamento();
        $listaEquipamentos = $modelEquipamento->listaEquipamentosPor('descricao asc');
        $this->view->listaEquipamentos = $listaEquipamentos;
    }


    public function adicionarEquipamentoAction() {
        $form = new Application_Form_Equipamento();

        if ($this->getRequest()->isPost()) {

            if ($form->isValid($_POST)) {
                $dados = $form->getValues();

                $model = new Application_Model_DbTable_Equipamento();
                $model->cadastraEquipamento($dados);

                $this->_redirect('/equipamento/index');
            }
        }
        $this->view->form = $form;
    }

    public function editarEquipamentoAction() {
        $form = new Application_Form_Equipamento();

        $numero = $this->getRequest()->getParam(Application_Model_DbTable_Equipamento::getPrimaryKeyName());

        $equipamentoModel = new Application_Model_DbTable_Equipamento();

        $form->populate($equipamentoModel->find($numero)->current()->toArray());

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $dados = $form->getValues();
                $equipamentoModel->editarEquipamento($dados);
                
                $this->_redirect('/equipamento/index');
            }
        }

        $this->view->form = $form;
    }

}

