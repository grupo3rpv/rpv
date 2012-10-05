<?php

class TipoSalaController extends Zend_Controller_Action {

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
        $modelTipoSala = new Application_Model_DbTable_TipoSala();
        $listaTipoSala = $modelTipoSala->listaTipoSalaPor('descricao asc');
        $this->view->listaTipoSala = $listaTipoSala;
    }

    public function cadastrarTipoSalaAction() {
        $form = new Application_Form_TipoSala();

        if ($this->getRequest()->isPost()) {

            if ($form->isValid($_POST)) {
                $dados = $form->getValues();

                $model = new Application_Model_DbTable_TipoSala();
                $model->cadastraTipoSala($dados);

                $this->_redirect('/tipo-sala/index');
            }
        }
        $this->view->form = $form;
    }

    public function editarTipoSalaAction() {
        $form = new Application_Form_TipoSala();

        $numero = $this->getRequest()->getParam(Application_Model_DbTable_TipoSala::getPrimaryKeyName());

        $tipoSalaModel = new Application_Model_DbTable_TipoSala();

        $form->populate($tipoSalaModel->find($numero)->current()->toArray());

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $dados = $form->getValues();
                $tipoSalaModel->editarTipoSala($dados);

                $this->_redirect('/tipo-sala/index');
            }
        }

        $this->view->form = $form;
    }

    public function removerTipoSalaAction() {
        $id_tipo_sala = $this->_getParam('id_tipo_sala');
        $tipoSalaModel = new Application_Model_DbTable_TipoSala();
        $tipoSalaModel->removerTipoSala($id_tipo_sala);
        $this->_redirect('/tipo-sala/index');
    }

}