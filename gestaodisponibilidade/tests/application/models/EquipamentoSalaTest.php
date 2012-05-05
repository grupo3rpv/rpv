<?php

class Application_Model_EquipamentoSalaTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testGetId_equipamento() {
        $equipamentoSalaModel = new Application_Model_DbTable_EquipamentoSala();
        $equipamentoSala = $equipamentoSalaModel->createRow();
        $equipamentoSala->setId_equipamento(2);
        $this->assertSame(2, $equipamentoSala->getid_equipamento());
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
        $this->assertSame(20, $equipamentoSala->getQuantidade());
    }

}

