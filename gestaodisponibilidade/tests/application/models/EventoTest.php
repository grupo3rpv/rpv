<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EventoTest
 *
 * @author Helison
 */
class Application_Model_EventoTest extends PHPUnit_Framework_TestCase {

    //put your code here
    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    public function testCadastraEvento() {
        $eventoModel = new Application_Model_DbTable_Evento();

        $eventoArray = array(
            'data_inicial' => '05/18/2012',
            'data_final' => '05/18/2012',
            'hora1' => '14:00:00',
            'hora2' => '15:00:00',
            'titulo' => "Reniao tal",
        );
        $id_evento = $eventoModel->cadastraEvento($eventoArray);
        /* @var $produto Application_Model_Sala */
        $this->assertSame('7', $id_evento);
    }

    public function testCadastraEventoDataComLetra() {
        $eventoModel = new Application_Model_DbTable_Evento();

        $eventoArray = array(
            'data_inicial' => '05/1b/2012',
            'data_final' => '05/18/2012',
            'hora1' => '14:00:00',
            'hora2' => '15:00:00',
            'titulo' => "Prova marcada",
        );
        
        $passou = true;
        try {
            $eventoModel->cadastraEvento($eventoArray);
            $passou = false;
        } catch (Exception $e) {
            echo $e;
        }
        $this->assertTrue($passou);
    }

    public function testCadastraEventoFinalAtrasado() {
        $eventoModel = new Application_Model_DbTable_Evento();

        $eventoArray = array(
            'data_inicial' => '05/18/2012',
            'data_final' => '05/18/2011',
            'hora1' => '14:00:00',
            'hora2' => '14:00:00',
            'titulo' => "Prova marcada",
        );
        $passou = true;
        try {
            $eventoModel->cadastraEvento($eventoArray);
            $passou = false;
        } catch (Exception $e) {
            echo $e;
        }
        $this->assertTrue($passou);
    }

    public function testCadastraEventoMes13() {
        $eventoModel = new Application_Model_DbTable_Evento();

        $eventoArray = array(
            'data_inicial' => '13/18/2012',
            'data_final' => '13/18/2012',
            'hora1' => '14:00:00',
            'hora2' => '14:00:00',
            'titulo' => "Prova marcada",
        );
        $passou = true;
        try {
            $eventoModel->cadastraEvento($eventoArray);
            $passou = false;
        } catch (Exception $e) {
            echo $e;
        }
        $this->assertTrue($passou);
    }

    public function testCadastraEventoMesmaHora() {
        $eventoModel = new Application_Model_DbTable_Evento();

        $eventoArray = array(
            'data_inicial' => '05/18/2012',
            'data_final' => '05/18/2012',
            'hora1' => '14:00:00',
            'hora2' => '14:00:00',
            'titulo' => "Prova marcada",
        );
        $passou = true;
        try {
            $eventoModel->cadastraEvento($eventoArray);
            $passou = false;
        } catch (Exception $e) {
            echo $e;
        }
        $this->assertTrue($passou);
    }

    public function testGetId_evento() {
        $eventoModel = new Application_Model_DbTable_Evento();
        $evento = $eventoModel->createRow();
        $evento->setId_evento(2);
        $this->assertSame(2, $evento->getId_evento());
    }

    public function testGetDataInicial() {
        $eventoModel = new Application_Model_DbTable_Evento();
        $evento = $eventoModel->createRow();
        $evento->setData_inicial('03/15/2012');
        $this->assertNotSame('2012/03/15', $evento->getData_inicial());
    }

    public function testGetDataFinal() {
        $eventoModel = new Application_Model_DbTable_Evento();
        $evento = $eventoModel->createRow();
        $evento->setData_final('03/16/2012');
        $this->assertNotSame('2012/03/16', $evento->getData_final());
    }

    public function testGetHora1() {
        $eventoModel = new Application_Model_DbTable_Evento();
        $evento = $eventoModel->createRow();
        $evento->setHora1('05:14:00');
        $this->assertSame('05:14:00', $evento->getHora1());
    }

    public function testGetHora2() {
        $eventoModel = new Application_Model_DbTable_Evento();
        $evento = $eventoModel->createRow();
        $evento->setHora2('05:14:03');
        $this->assertSame('05:14:03', $evento->getHora2());
    }

}