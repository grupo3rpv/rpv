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
    
    public function testRecebeDisponibilidadeAulaAction(){
        $frontController = $this->getFrontController();
        $frontController->getRouter()->addDefaultRoutes();
        $params = array('action' => 'recebeDisponibilidadeAula',
            'controller' => 'professor',
            'module' => 'default',
            'id_usuario' => 5);
        
        $this->request->setMethod('GET');
        $this->request->setPost(array(
            'id_usuario' => 5,
            'id' => '10:30:00-segunda'
        ));
        
        $urlParams = $this->urlizeOptions($params);
        $url = $this->url($urlParams);
        $this->dispatch($url);
        
        $this->assertModule($urlParams['module']);
        $this->assertController($urlParams['controller']);
        $this->assertAction($urlParams['action']);
    }

}
