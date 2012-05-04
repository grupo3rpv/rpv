<?php

class Application_Model_TipoSalaTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testGetDescricao() {
        $tipoSalaModel = new Application_Model_DbTable_Sala();
        $tipoSala = $tipoSalaModel->createRow();
        $tipoSala->setDescricao('Laboratorio');
        $this->assertSame('Laboratorio', $tipoSala->getDescricao());
    }

    public function testIdSala() {
        $tipoSalaModel = new Application_Model_DbTable_Sala();
        $tipoSala = $tipoSalaModel->createRow();
        $tipoSala->setIdSala($sala);
        $this->assertSame($sala, $tipoSala->getIdSala($sala));
    }

}