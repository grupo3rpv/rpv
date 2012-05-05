<?php

class Application_Model_EquipamentoTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }
    
    public function testgetId_equipamento(){
        $equipamentoModel = new Application_Model_DbTable_Equipamento();
        $equipamento = $equipamentoModel->createRow();
        $equipamento->setId_equipamento(1);
        $this->assertSame(1, $equipamento->getId_equipamento());
    }
    
     public function testGetDescricao(){
        $equipamentoModel = new Application_Model_DbTable_Equipamento();
        $equipamento = $equipamentoModel->createRow();
        $equipamento->setDescricao('notebook');
        $this->assertSame('notebook', $equipamento->getDescricao());
    }
    
 
    
    
    
}


