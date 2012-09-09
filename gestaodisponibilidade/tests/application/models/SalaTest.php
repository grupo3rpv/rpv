<?php

class Application_Model_SalaTest extends PHPUnit_Framework_TestCase {

    private $_numeroSala = '1000';

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testGetId_tipo_sala() {
        $salaModel = new Application_Model_DbTable_Sala();
        $sala = $salaModel->createRow();
        $sala->setId_tipo_sala(2);
        $this->assertSame(2, $sala->getId_tipo_sala());
    }

    public function testGetNumero() {
        $salaModel = new Application_Model_DbTable_Sala();
        $sala = $salaModel->createRow();
        $sala->setNumero('3234');
        $this->assertSame('3234', $sala->getNumero());
    }

    public function testGetDescricao() {
        $salaModel = new Application_Model_DbTable_Sala();
        $sala = $salaModel->createRow();
        $sala->setDescricao('teste');
        $this->assertSame('teste', $sala->getDescricao());
    }

    public function testGetCapacidade() {
        $salaModel = new Application_Model_DbTable_Sala();
        $sala = $salaModel->createRow();
        $sala->setCapacidade('50');
        $this->assertSame('50', $sala->getCapacidade());
    }

    public function testGetInfo_adicionais() {
        $salaModel = new Application_Model_DbTable_Sala();
        $sala = $salaModel->createRow();
        $sala->setInfo_adicionais('teste');
        $this->assertSame('teste', $sala->getInfo_adicionais());
    }

    public function testGetStatus_disponibilidade() {
        $salaModel = new Application_Model_DbTable_Sala();
        $sala = $salaModel->createRow();
        $sala->setStatus_disponibilidade('Disponivel');
        $this->assertSame('Disponivel', $sala->getStatus_disponibilidade());
    }

    public function testGetResponsavel() {
        $salaModel = new Application_Model_DbTable_Sala();
        $sala = $salaModel->createRow();
        $sala->setResponsavel('Bruno');
        $this->assertSame('Bruno', $sala->getResponsavel());
    }

    public function testCapacidade_desc() {
        $salaModel = new Application_Model_DbTable_Sala();
        $sala = $salaModel->createRow();
        $sala->setCapacidade_desc('pessoas');
        $this->assertSame('pessoas', $sala->getCapacidade_desc());
    }

    public function testCadastraSala() {
        $salaModel = new Application_Model_DbTable_Sala();
        $equipamentos = array('id_equipamento_sala' => '4');
        $salaArray = array(
            'numero' => '30908',
            'descricao' => 'Laboratório',
            'capacidade' => '20',
            'capacidade_desc' => 'pessoas',
            'info_adicionais' => 'sala para fazer teste',
            'status_disponibilidade' => true,
            'id_tipo_sala' => '1',
            'responsavel' => 'Bruno',
            'id_equipamento'=> $equipamentos
        );
        $id_sala = $salaModel->cadastraSala($salaArray);
        /* @var $produto Application_Model_Sala */
        $this->assertSame('30908', $id_sala);
    }

    public function testAlterarSala() {
        $salaModel = new Application_Model_DbTable_Sala();
        $salas = $salaModel->buscaPor($alias, $value);
        $sala = $salas[0];
        $arraySala = array(
            'numero' => $this->_numeroSala,
            'descricao' => 'Laboratório',
            'capacidade' => '20',
            'capacidade_desc' => 'pessoas',
            'info_adicionais' => 'sala para fazer teste',
            'status_disponibilidade' => 'disponivel',
            'id_tipo_sala' => '1',
            'responsavel' => 'Bruno',
        );

        /* @var $sala Application_Model_Produto */
        $salaModel->editarSala($sala->getNumero(), $arraySala);

        $id_sala = $salaModel->find($sala->getNumero())->current();

        /* @var $produto Application_Model_Sala */
        $this->assertSame('1000', $id_sala);
    }

    public function testRemoverSala() {
        $salaModel = new Application_Model_DbTable_Sala();
        $salaParaRemover = $salaModel->find($this->_numeroSala);
        $this->fail("Não implementado ainda");
    }

}
