<?php

class Application_Model_TipoSalaTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }
    
    public function testCadastrarTipoSala() {
        Application_Model_DbTable_TipoSala::getValuesToSelectElement($order);
    }
}