<?php

/**
 * Description of GerenciamentoController
 *
 * @author Helison
 */
class AreaProfessorController extends Zend_Controller_Action {

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
        // action body
    }

}