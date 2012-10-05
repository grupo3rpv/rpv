<?php

/**
 * Description of AreaController
 *
 * @author Helison
 */
class AreaController extends Zend_Controller_Action {

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
        $modelArea = new Application_Model_DbTable_Area();
        $listaArea = $modelArea->listaAreaPor('nome asc');
        $this->view->listarTodos = $listaArea;
    }

    public function adicionarAreaAction() {
        $form = new Application_Form_Area();

        if ($this->getRequest()->isPost()) {

            if ($form->isValid($_POST)) {
                $dados = $form->getValues();

                $model = new Application_Model_DbTable_Area();
                $model->cadastraArea($dados);

                $this->_redirect('/Area/index');
            }
        }
        $this->view->form = $form;
    }

    public function editarAreaAction() {
        $form = new Application_Form_Area();

        $numero = $this->getRequest()->getParam(Application_Model_DbTable_Area::getPrimaryKeyName());

        $areaModel = new Application_Model_DbTable_Area();

        $form->populate($areaModel->find($numero)->current()->toArray());

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $dados = $form->getValues();
                $areaModel->editarArea($dados);

                $this->_redirect('/area/index');
            }
        }

        $this->view->form = $form;
    }

    public function removerAreaAction() {
        $id_area = $this->_getParam('id_area');
        $areaModel = new Application_Model_DbTable_Area();
        $areaModel->removerArea($id_area);
        $this->_redirect('/area/index');
    }

}