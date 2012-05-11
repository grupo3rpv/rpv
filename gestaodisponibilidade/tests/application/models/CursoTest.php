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
     
     public function testEditarCurso(){
         $modelCurso = new Application_Model_DbTable_Curso();
         $dados = array(
             'id_curso'=>'23',
             'nome'=>'Teste1 alterado',
             'codigo'=>'12',
         );
         $id = $modelCurso->editarCurso($dados);
         $cursoAlterado =  $modelCurso->find($id)->current();
         $this->assertSame('Teste1 alterado', $cursoAlterado->getNome());
     }
     
     public function testExcluirCurso(){
         $modelCurso = new Application_Model_DbTable_Curso();
         $numLinhas = $modelCurso->removerCurso('23');
         $this->assertSame(1, $numLinhas);
         
     }
     
    

}
