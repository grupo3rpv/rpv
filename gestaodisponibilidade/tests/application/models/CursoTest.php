<?php

class Application_Model_CursoTest extends PHPUnit_Framework_TestCase {

    

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }
    
    public function testCadastroCurso(){
         $modelCurso = new Application_Model_DbTable_Curso();
         $dados = array(
             'id_curso'=>'23',
             'nome'=>'Teste1',
             'codigo'=>'12',
         );
         $id = $modelCurso->cadastraCurso($dados);
     
         $this->assertSame('23', $id);
         
     }
    

}
