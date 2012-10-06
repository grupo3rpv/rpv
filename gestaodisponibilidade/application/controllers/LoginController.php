<?php

class LoginController extends Zend_Controller_Action {

    public function init() {
        
    }

    public function logarAction() {

        $login = new Application_Form_Login();

        if ($this->getRequest()->isPost()) {
            if ($login->isValid($_POST)) {
                $array = array();
                $modelSessao = new Application_Model_SessaoAcesso();
                $modelSessao->inserirDados($array);

                $dados = $login->getValues();

                $db = Zend_Db_Table::getDefaultAdapter();

                $authAdapter = new Zend_Auth_Adapter_DbTable(
                                $db,
                                'usuario',
                                'email',
                                'senha');

                $authAdapter->setIdentity($dados['email']);
                $authAdapter->setCredential($dados['senha']);

                $result = $authAdapter->authenticate();
                if ($result->isValid()) {
                    $auth = Zend_Auth::getInstance();
                    $storage = $auth->getStorage();
                    $storage->write($authAdapter->getResultRowObject(array('id_usuario', 'nome', 'tipo_usuario')));
                } else {

                    $this->view->error = "Usuário ou senha incorreta!";
                }
            }
        }

        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $identity = $auth->getIdentity();
            $modelUsuario = new Application_Model_DbTable_Usuario();

            $usuario = $modelUsuario->getUsuarioPorEmail($dados['email']);
            $modelSessaoUsuario = new Application_Model_SessaoUser();
            $modelSessaoUsuario->inserirDados($usuario);
           
            $urlRequisitante = $this->getRequest()->getRequestUri();
            if($urlRequisitante =="/rpv/gestaodisponibilidade/public/login/logar" ){
              
                if ($usuario->getTipo_usuario() == 'secretario') {
                    $this->_redirect('/cadastros');
                } else if ($usuario->getTipo_usuario() == 'professor') {
                    $this->_redirect('/area-professor');
                } else if ($usuario->getTipo_usuario() == 'coordenador') {
                    $this->_redirect('/area-coordenador');
                } else if ($usuario->getTipo_usuario() == 'admin') {
                    $this->_redirect('/admin');
                }  
            }
            else{
                $this->_redirect($urlRequisitante);
            }
           
            
        }

        $this->view->login = $login;
    }

    public function sairAction() {
        $sessionUsuario = new Application_Model_SessaoUser();
        $usuario = $sessionUsuario->getSession();
        $id_usuario = $usuario['id_usuario'];

        $authAdapter = Zend_Auth::getInstance();
        $authAdapter->clearIdentity();
        $this->_redirect('/login/logar');
    }

    public function acessoNegadoAction() {
        
    }

}