<?php

/**
 * Description of ProfessorControllerTest
 *
 * @author thiago
 */
class ProfessorControllerTest extends Zend_Test_PHPUnit_ControllerTestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    protected function tearDown() {
        parent::tearDown();
    }

    public function testDisponibilidadeAulaAction() {
        $frontController = $this->getFrontController();
        $frontController->getRouter()->addDefaultRoutes();
        $params = array('action' => 'disponibilidade-aula',
            'controller' => 'professor',
            'module' => 'default',
            'id_usuario' => 1);
        $urlParams = $this->urlizeOptions($params);
        $url = $this->url($urlParams);
        $this->dispatch($url);

        $this->assertModule($urlParams['module']);
        $this->assertController($urlParams['controller']);
        $this->assertAction($urlParams['action']);
    }

    public function testRecebeDisponibilidadeAulaAction() {
        $frontController = $this->getFrontController();
        $frontController->getRouter()->addDefaultRoutes();
        $params = array('action' => 'recebe-disponibilidade-aula',
            'controller' => 'professor',
            'module' => 'default',
            'id_usuario' => 1,
            'id' => '10:30:00-sexta');

        $this->request->setMethod('GET');

        $urlParams = $this->urlizeOptions($params);
        $url = $this->url($urlParams);
        $this->dispatch($url);

        $this->assertModule($urlParams['module']);
        $this->assertController($urlParams['controller']);
        $this->assertAction($urlParams['action']);

        $id_usuario = 1;
        $dia = "sexta";
        $dh = false;
        $hora = "10:30:00";
        $disponibilidadeAula = new Application_Model_DbTable_DisponibilidadeAula();
        $disponibilidades = $disponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
        foreach ($disponibilidades as $disponibilidade) {
            if ($disponibilidade->getHora() == $hora && $disponibilidade->getDia() == $dia) {
                $dh = true;
            }
        }
        $this->assertTrue($dh);
        
        $this->dispatch($url);
        $this->assertModule($urlParams['module']);
        $this->assertController($urlParams['controller']);
        $this->assertAction($urlParams['action']);
        
        $disponibilidades = $disponibilidadeAula->listaDisponibilidadesPorId($id_usuario);
        foreach ($disponibilidades as $disponibilidade) {
            if ($disponibilidade->getHora() == $hora && $disponibilidade->getDia() == $dia) {
                $dh = false;
            }
        }
        $this->assertTrue($dh);
    }

}
