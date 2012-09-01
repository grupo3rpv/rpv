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
        $this->fail("Não implementado ainda");
    }
    
    public function testRecebeDisponibilidadeAulaAction(){
        $this->fail("Não implementado ainda");
    }

}
