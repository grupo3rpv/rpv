<?php

class Application_Model_UsuarioTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testGetEventos(){
        $dbUsuario = new Application_Model_DbTable_Usuario();
        $modelUsuario = $dbUsuario->createRow();
        $modelUsuario->setId_usuario('1');
        $eventos = $modelUsuario->getEventos();
        var_dump($eventos);
        
    }
    
    
}
