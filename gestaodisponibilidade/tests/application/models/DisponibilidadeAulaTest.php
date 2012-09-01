<?php

/**
 * Description of Area
 *
 * @author thiago
 */
class Application_Model_DisponibilidadeAulaTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    protected function tearDown() {
        parent::tearDown();
    }

    public function testGetId_disponibilidade_aula() {
        $this->fail("Não implementado ainda");
    }

    public function testSetId_disponibilidade_aula() {
        $this->fail("Não implementado ainda");
    }

    public function testGetId_usuario() {
        $this->fail("Não implementado ainda");
    }

    public function testSetId_usuario() {
        $this->fail("Não implementado ainda");
    }

    public function testGetDia() {
        $this->fail("Não implementado ainda");
    }

    public function testSetDia() {
        $this->fail("Não implementado ainda");
    }

    public function testGetHora() {
        $this->fail("Não implementado ainda");
    }

    public function testSetHora() {
        $this->fail("Não implementado ainda");
    }

}
