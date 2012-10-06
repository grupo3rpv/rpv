<?php

class UsuarioController extends Zend_Controller_Action {

    public function init() {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $entity = Zend_Auth::getInstance()->getIdentity();
            if ($entity->tipo_usuario == 'professor' ||
                    $entity->tipo_usuario == 'coordenador' ||
                    $entity->tipo_usuario == 'admin') {
            } else {
                $this->_redirect('/login/acesso-negado/');
            }
        } else {
            $this->_redirect('/login/logar/');
        }
    }

    public function indexAction() {
        
    }

    public function perfilAction() {
        $form = new Application_Form_Usuario();
         $sessionUsuario = new Application_Model_SessaoUser();
        $usuario = $sessionUsuario->getSession();
        $numero =$usuario->getId_usuario();
        //$numero = $this->getRequest()->getParam(Application_Model_DbTable_Professor::getPrimaryKeyName());
        $professorModel = new Application_Model_DbTable_Professor();

        $professor = $professorModel->find($numero)->current();
        $dados = $professor->toArray();

        $this->inserirAreaForm($form);
        $this->inserirAreaInteresseForm($form, $professor);

        $form->populate($dados);

        if ($this->getRequest()->isPost()) {
            if ($form->isValid($_POST)) {
                $dados = $form->getValues();
                $professorModel->editarProfessor($dados);

                $this->_redirect('/area-professor/');
            }
        }

        $this->view->form = $form;
    }

    private function inserirAreaForm($form) {
        $element = $form->getElement(Application_Model_DbTable_Area::getPrimaryKeyName());
        $modelArea = new Application_Model_DbTable_Area();
        $element->addMultiOptions($modelArea->getIdsENomesTodasAreas());
        $form->addElement($element);
    }

    private function inserirAreaInteresseForm($form, Application_Model_Professor $professor) {
        $element = $form->getElement(Application_Model_DbTable_AreaProfessor::getPrimaryKeyName());
        $areasInteresse = $professor->getAreasInteresse();
        
        $element->addMultiOptions($areasInteresse);
        $form->addElement($element);
    }

}