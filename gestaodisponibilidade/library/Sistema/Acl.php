<?php

class Sistema_Acl extends Zend_Controller_Plugin_Abstract {

    public function preDispatch(Zend_Controller_Request_Abstract $request) {

        $acl = new Zend_Acl();
        $acl->addRole(new Zend_Acl_Role('secretario'));
        $acl->addRole(new Zend_Acl_Role('professor'));
        $acl->addRole(new Zend_Acl_Role('coordenador'), 'professor');
        $acl->addRole(new Zend_Acl_Role('admin'), array('coordenador', 'secretario'));

        $acl->add(new Zend_Acl_Resource('equipamento'));
        $acl->add(new Zend_Acl_Resource('sala'));
        $acl->add(new Zend_Acl_Resource('curso'));
        $acl->add(new Zend_Acl_Resource('disciplina'));
        $acl->add(new Zend_Acl_Resource('secretaria'));
        $acl->add(new Zend_Acl_Resource('cadastros'));
        $acl->add(new Zend_Acl_Resource('area-professor'));
        $acl->add(new Zend_Acl_Resource('professor'));
        $acl->add(new Zend_Acl_Resource('horario'));
        $acl->add(new Zend_Acl_Resource('area'));
        $acl->add(new Zend_Acl_Resource('login'));
        $acl->add(new Zend_Acl_Resource('agenda'));
        $acl->add(new Zend_Acl_Resource('index'));
        $acl->add(new Zend_Acl_Resource('area-coordenador'));
        $acl->add(new Zend_Acl_Resource('usuario'));
        $acl->add(new Zend_Acl_Resource('tipo-sala'));
        $acl->add(new Zend_Acl_Resource('admin'));

        //Secretario
        $acl->allow('secretario', 'curso', array('adicionar-curso', 'editar-curso', 'remover'));
        $acl->allow('secretario', 'equipamento');
       // $acl->allow('secretario', 'sala');
        $acl->allow('secretario', 'secretaria');
        $acl->allow('secretario', 'cadastros');
        $acl->allow('secretario', 'login');
        $acl->allow('secretario', 'tipo-sala');
        $acl->allow('secretario', 'index');

        //professor
        $acl->allow('professor', 'area-professor');
        $acl->allow('professor', 'usuario', array('perfil'));
        $acl->allow('professor', 'agenda', array('index', 'cadastrar-evento', 'add-evento', 'confirmacao-evento', 'recusar-evento'));
        $acl->allow('professor', 'professor',array('nivel-interesse','nivel-interesse-edit','perfil','editar-nivel-interesse','recebe-disponibilidade-aula','adicionar-convidados','get-eventos'));
        $acl->allow('professor', 'curso',array('listar-cursos','disciplina'));
        $acl->allow('professor', 'index');

        //coordenador
        $acl->allow('coordenador', 'horario');
        $acl->allow('coordenador', 'area');
        $acl->allow('coordenador', 'login');
        $acl->allow('coordenador', 'area-coordenador');
        //$acl->allow('coordernador','disciplina');
        //$acl->allow('secretario', 'area-coordenador');
        //admin
        $acl->allow('admin', 'admin');
        
        $acl->allow(null, 'login', array('logar', 'acesso-negado', 'sair'));

        $auth = Zend_Auth::getInstance();
        if ($auth->hasIdentity()) {
            $identity = $auth->getIdentity();
            $role = $identity->tipo_usuario;
        } else {
            $role = null;
        }

        $module = $request->module;
        $controller = $request->controller;
        $action = $request->action;

        if (!$acl->isAllowed($role, $controller, $action)) {
            if ($role == null) {
                $request->setControllerName('login');
                $request->setActionName('logar');
            } else {
                $request->setControllerName('login');
                $request->setActionName('acesso-negado');
            }
        }
    }
}