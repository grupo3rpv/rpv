<?php
  
class Bootstrap extends Zend_Application_Bootstrap_Bootstrap
{
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
      

}
}

