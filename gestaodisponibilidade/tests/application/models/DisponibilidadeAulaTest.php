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

    public function testGetDia() {
        $dispAulaDAO = new Application_Model_DbTable_DisponibilidadeAula();
        $disponibilidadeAula = $dispAulaDAO->createRow();
        $dia = "";
        $disponibilidadeAula->dia = $dia;
        $this->assertEquals($dia, $disponibilidadeAula->getDia());
        
        $dia = "quarta";
        $disponibilidadeAula->dia = $dia;
        $this->assertEquals($dia, $disponibilidadeAula->getDia());
        
        $dia = "akjsfhlasd";
        $disponibilidadeAula->dia = $dia;
        $this->assertEquals($dia, $disponibilidadeAula->getDia());
        
        $dia = "679823498";
        $disponibilidadeAula->dia = $dia;
        $this->assertEquals($dia, $disponibilidadeAula->getDia());
    }

    public function testSetDia() {
        $dispAulaDAO = new Application_Model_DbTable_DisponibilidadeAula();
        $disponibilidadeAula = $dispAulaDAO->createRow();
        $dia = "";
        try {
            $disponibilidadeAula->setDia($dia);
            $this->fail("Valor inválido sendo setado");
        } catch (Exception $e) {
            $this->assertNull($disponibilidadeAula->getDia());
        }
        
        $dia = "quarta";
        $disponibilidadeAula->setDia($dia);
        $this->assertEquals($dia, $disponibilidadeAula->getDia());
        
        $dia = "akjsfhlasd";
        try {
            $disponibilidadeAula->setDia($dia);
            $this->fail("Valor inválido sendo setado");
        } catch (Exception $e) {
            $this->assertEquals("quarta", $disponibilidadeAula->getDia());
        }
        
        $dia = "679823498";
        try {
            $disponibilidadeAula->setDia($dia);
            $this->fail("Valor inválido sendo setado");
        } catch (Exception $e) {
            $this->assertEquals("quarta", $disponibilidadeAula->getDia());
        }
    }

    public function testGetHora() {
        $dispAulaDAO = new Application_Model_DbTable_DisponibilidadeAula();
        $disponibilidadeAula = $dispAulaDAO->createRow();
        $hora = "";
        $disponibilidadeAula->hora = $hora;
        $this->assertEquals($hora, $disponibilidadeAula->getHora());
        
        $hora = "07:30";
        $disponibilidadeAula->hora = $hora;
        $this->assertEquals($hora, $disponibilidadeAula->getHora());
        
        $hora = "00:aksdjf";
        $disponibilidadeAula->hora = $hora;
        $this->assertEquals($hora, $disponibilidadeAula->getHora());
        
        $hora = "lksjdhflkdsh";
        $disponibilidadeAula->hora = $hora;
        $this->assertEquals($hora, $disponibilidadeAula->getHora());
    }

    public function testSetHora() {
        $dispAulaDAO = new Application_Model_DbTable_DisponibilidadeAula();
        $disponibilidadeAula = $dispAulaDAO->createRow();
        $hora = "";
        try {
            $disponibilidadeAula->setHora($hora);
            $this->fail("Valor inválido sendo setado");
        } catch (Exception $e) {
            $this->assertNull($disponibilidadeAula->getHora());
        }
        
        $hora = "07:30";
        $disponibilidadeAula->setHora($hora);
        $this->assertEquals($hora, $disponibilidadeAula->getHora());
        
        $hora = "00:aksdjf";
        try {
            $disponibilidadeAula->setHora($hora);
            $this->fail("Valor inválido sendo setado");
        } catch (Exception $e) {
            $this->assertEquals("07:30", $disponibilidadeAula->getHora());
        }
        
        $hora = "lksjdhflkdsh";
        try {
            $disponibilidadeAula->setHora($hora);
            $this->fail("Valor inválido sendo setado");
        } catch (Exception $e) {
            $this->assertEquals("07:30", $disponibilidadeAula->getHora());
        }
    }

}
