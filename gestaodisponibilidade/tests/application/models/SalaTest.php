<?php

class Application_Model_SalaTest extends PHPUnit_Framework_TestCase {
    
    private $_numeroSala = '1000';

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testGetNumero() {
        $salaModel = new Application_Model_DbTable_Sala();
        $sala = $salaModel->createRow();
        $sala->setNumero('3234');
        $this->assertSame('3234', $sala->getNumero());
    }

    public function testSetGetDescricao() {
        $salaModel = new Application_Model_DbTable_Sala();
        $sala = $salaModel->createRow();
        $sala->setDescricao('teste');
        $this->assertSame('teste', $sala->getDescricao());
    }

    public function testCadastraSala() {
        $salaModel = new Application_Model_DbTable_Sala();
        $salaArray = array(
            'numero' => $this->_numeroSala,
            'descricao' => 'Laboratório',
            'capacidade' => '20',
            'capacidade_desc' => 'pessoas',
            'info_adicionais' => 'sala para fazer teste',
            'status_disponibilidade' => true,
            'id_tipo_sala' => '1',
            'responsavel' => 'Bruno',
        );
        $id_sala = $salaModel->cadastraSala($salaArray);
        /* @var $produto Application_Model_Sala */
        $this->assertSame('1000', $id_sala);
    }

    public function testAlterarSala() {
        $this->fail("Não implementado ainda");
    }
    
    public function testRemoverSala() {
        $salaModel = new Application_Model_DbTable_Sala();
        $salaParaRemover = $salaModel->find($this->_numeroSala);
        $this->fail("Não implementado ainda");
    }

}
