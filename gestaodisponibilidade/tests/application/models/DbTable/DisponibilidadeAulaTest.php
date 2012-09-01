<?php

/**
 * Description of DisponibilidadeAulaTest
 *
 * @author thiago
 */
class Application_Model_DbTable_DisponibilidadeAulaTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        $usuarioDAO = new Application_Model_DbTable_Usuario();
        for ($i = 1; $i <= 4; $i++) {
            $user = $usuarioDAO->find($i);
            if (count($user) == 0) {
                /* @var $usuario Application_Model_Usuario */
                $usuario = $usuarioDAO->createRow();
                $usuario->setId_usuario($i);
                $usuario->save();
            }
        }
        parent::setUp();
    }

    protected function tearDown() {
        parent::tearDown();
    }

    /**
     * @covers Application_Model_DbTable_DisponibilidadeAula::gravarDados
     * @author thiago
     */
    public function testGravarDados() {
        $id_usuario = 1;
        $dia = "segunda";
        $hora = "7:30";
        $disponibilidadeAula = new Application_Model_DbTable_DisponibilidadeAula();
        $disponibilidadeAula->gravarDados($id_usuario, $dia, $hora);
        
        $disponibilidades = $disponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
        /* @var $disponibilidade Application_Model_DisponibilidadeAula */
        foreach ($disponibilidades as $disponibilidade) {
            $this->assertEquals($disponibilidade->getId_usuario(), $id_usuario);
            $this->assertEquals($disponibilidade->getDia(), $dia);
            $this->assertEquals($disponibilidade->getHora(), $hora);
        }
        $this->assertEquals(count($disponibilidades), 1);
        
        $dia = "terça-feira";
        $hora = "numero";
        try {
            $disponibilidadeAula->gravarDados($id_usuario, $dia, $hora);
            $this->fail("Gravando com dados inválidos");
        } catch (Exception $e) {
            $disponibilidades = $disponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
            $this->assertEquals(1, count($disponibilidades));
        }
        
        $dia = "";
        $hora = "";
        try {
            $disponibilidadeAula->gravarDados($id_usuario, $dia, $hora);
            $this->fail("Gravando com dados vazios");
        } catch (Exception $e) {
            $disponibilidades = $disponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
            $this->assertEquals(1, count($disponibilidades));
        }
        
        $dia2 = "quarta";
        $hora2 = "10:30";
        $disponibilidadeAula->gravarDados($id_usuario, $dia, $hora);
        $i=0;
        $disponibilidades = $disponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
        foreach ($disponibilidades as $disponibilidade) {
            if ($i == 0) {
                $this->assertEquals($disponibilidade->getId_usuario(), $id_usuario);
                $this->assertEquals($disponibilidade->getDia(), $dia);
                $this->assertEquals($disponibilidade->getHora(), $hora);
            } else if ($i==1) {
                $this->assertEquals($disponibilidade->getId_usuario(), $id_usuario);
                $this->assertEquals($disponibilidade->getDia(), $dia2);
                $this->assertEquals($disponibilidade->getHora(), $hora2);
            } else {
                $this->fail("Mais de duas disponibilidades cadastradas");
            }
            $i++;
        }
        $this->assertEquals(count($disponibilidades), 2);
    }

    /**
     * @covers Application_Model_DbTable_DisponibilidadeAula::removeDados
     * @author thiago
     */
    public function testRemoveDados() {
        $id_usuario = 2;
        $dia = "quinta";
        $hora = "16:30";
        $disponibilidadeAula = new Application_Model_DbTable_DisponibilidadeAula();
        $disponibilidadeAula->gravarDados($id_usuario, $dia, $hora);
        $disponibilidades = $disponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
        $this->assertEquals(count($disponibilidades), 1);
        
        $disponibilidadeAula->removeDados($id_usuario, $dia, $hora);
        $disponibilidades = $disponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
        $this->assertEquals(count($disponibilidades), 0);
        
        $dia2 = "sexta";
        $hora2 = "20:30";
        $disponibilidadeAula->gravarDados($id_usuario, $dia, $hora);
        $disponibilidadeAula->gravarDados($id_usuario, $dia2, $hora2);
        $disponibilidades = $disponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
        $this->assertEquals(count($disponibilidades), 2);
        
        $disponibilidadeAula->removeDados($id_usuario, $dia, $hora);
        $disponibilidades = $disponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
        $this->assertEquals(count($disponibilidades), 1);
    }

    /**
     * @covers Application_Model_DbTable_DisponibilidadeAula::verificaCelulaSelecionada
     * @author thiago
     */
    public function testVerificaCelulaSelecionada() {
        $id_usuario = 3;
        $dia = "segunda";
        $hora = "18:30";
        $disponibilidadeAula = new Application_Model_DbTable_DisponibilidadeAula();
        $count = $disponibilidadeAula->verificaCelulaSelecionada($id_usuario, $dia, $hora);
        $this->assertEquals($count, 0);
        
        $disponibilidadeAula->gravarDados($id_usuario, $dia, $hora);
        $count = $disponibilidadeAula->verificaCelulaSelecionada($id_usuario, $dia, $hora);
        $this->assertEquals($count, 1);
    }
    
    /**
     * @covers Application_Model_DbTable_DisponibilidadeAula::listaDisponibilidadesPorId
     * @author thiago
     */
    public function testListaDisponibilidadesPorId() {
        $id_usuario = 4;
        $disponibilidadeAula = new Application_Model_DbTable_DisponibilidadeAula();
        $disponibilidades = $disponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
        $this->assertEquals(count($disponibilidades), 0);
        
        $dia = "terça";
        $hora = "09:30";
        $disponibilidadeAula->gravarDados($id_usuario, $dia, $hora);
        $disponibilidades = $disponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
        $this->assertEquals(count($disponibilidades), 1);
        
        $dia = "quinta";
        $hora = "09:30";
        $disponibilidadeAula->gravarDados($id_usuario, $dia, $hora);
        $disponibilidades = $disponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
        $this->assertEquals(count($disponibilidades), 2);
        
        $dia = "quinta";
        $hora = "09:30";
        $disponibilidadeAula->removeDados($id_usuario, $dia, $hora);
        $disponibilidades = $disponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
        $this->assertEquals(count($disponibilidades), 1);
    }

}