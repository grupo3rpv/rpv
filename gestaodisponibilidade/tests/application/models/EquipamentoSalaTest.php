<?php

class Application_Model_EquipamentoSalaTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testGetId_equipamento_sala() {
        $equipamentoSalaModel = new Application_Model_DbTable_EquipamentoSala();
        $equipamentoSala = $equipamentoSalaModel->createRow();
        $equipamentoSala->setId_equipamento_sala(2);
        $this->assertSame(2, $equipamentoSala->getId_equipamento_sala());
    }

    public function testGetNumero_sala() {
        $equipamentoSalaModel = new Application_Model_DbTable_EquipamentoSala();
        $equipamentoSala = $equipamentoSalaModel->createRow();
        $equipamentoSala->setNumero_sala(2000);
        $this->assertSame(2000, $equipamentoSala->getNumero_sala());
    }

    public function testGetQuantidade() {
        $equipamentoSalaModel = new Application_Model_DbTable_EquipamentoSala();
        $equipamentoSala = $equipamentoSalaModel->createRow();
        $equipamentoSala->setQuantidade(10);
        $this->assertSame(10, $equipamentoSala->getQuantidade());
    }

}

