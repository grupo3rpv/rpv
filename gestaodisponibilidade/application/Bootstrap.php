<?php

class Bootstrap extends Zend_Application_Bootstrap_Bootstrap {

    protected function _initPlugins() {
        $frontController = Zend_Controller_Front::getInstance();
        $frontController->registerPlugin(new Sistema_Acl());
    }

    public function _initResources() {
        $this->bootstrap('view');
        $this->bootstrap('db');
          $view = $this->getResource('view');
         if (Zend_Auth::getInstance()->hasIdentity()) {
            $view->identity = Zend_Auth::getInstance()->getIdentity();
        }
    }

    protected function _initRotas() {
        $router = Zend_Controller_Front::getInstance()->getRouter();
        $route = new Zend_Controller_Router_Route(
                        'secretaria/editar-sala/:numero',
                        array(
                            'module' => 'default',
                            'controller' => 'secretaria',
                            'action' => 'editar-sala',
                        )
        );
        $router->addRoute('secretaria', $route);

        $route = new Zend_Controller_Router_Route(
                        'curso/disciplina/:id',
                        array(
                            'module' => 'default',
                            'controller' => 'curso',
                            'action' => 'disciplina',
                        )
        );
        $router->addRoute('curso', $route);

        $route = new Zend_Controller_Router_Route(
                        'professor/nivel-interesse/:id',
                        array(
                            'module' => 'default',
                            'controller' => 'professor',
                            'action' => 'nivel-interesse',
                        )
        );
        $router->addRoute('profAdd', $route);
    }

}