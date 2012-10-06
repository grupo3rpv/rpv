<?php

class EquipamentoController extends Zend_Controller_Action {

    public function init() {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $entity = Zend_Auth::getInstance()->getIdentity();
            if ($entity->tipo_usuario == 'secretario' ||
                    $entity->tipo_usuario == 'admin') {
                
            } else {
                $this->_redirect('/login/acesso-negado/');
            }
        } else {
            $this->_redirect('/login/logar/');
        }
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

    public function removerEquipamentoAction() {
        $idEquipamento = $this->_getParam('id_equipamento');
        $equipamentoModel = new Application_Model_DbTable_Equipamento();
        $linhasDeletadas = $equipamentoModel->removerEquipamento($idEquipamento);
        $this->_redirect('/equipamento/index');
    }

}

