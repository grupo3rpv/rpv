<?php

class SecretariaControllerTest extends PHPUnit_Framework_TestCase 
{

    public function setUp()
    {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

    

    
    public function testGetNumero(){
        $model = new Application_Model_Sala();
        $model->setNumero('3234');
        $this->assertSame('3234', $model->getNumero());
        
    }
    
     public function testSetGetDescricao(){
        $model = new Application_Model_Sala();
        $model->setDescricao('teste');
        $this->assertSame('teste', $model->getDescricao());
        
    }
    
    
    
    


}



