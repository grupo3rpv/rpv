<?php

class Application_Model_DisciplinaTest extends PHPUnit_Framework_TestCase {

    

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }
    
    public function testCadastroDisciplina(){
         $modelDisciplina = new Application_Model_DbTable_Disciplina();
         $dados = array(
             'id_disciplina'=>'23',
             'codigo'=>'Al0089',
             'nome'=>'Fisica',
             'ementa' => '..............',
             'carga_horaria' => '50h',
             'info_adicionais' => 'infoo',
                      
         );
         $id = $modelDisciplina->cadastraDisciplina($dados);
     
         $this->assertSame('23', $id);
         
     }
     
     public function testEditarDisciplina(){
         $modelDisciplina = new Application_Model_DbTable_Disciplina();
         $dados = array(
             'id_disciplina'=>'23',
             'codigo'=>'Al0089',
             'nome'=>'Biologia',
             'ementa' => '..............',
             'carga_horaria' => '40h',
             'info_adicionais' => 'blahhhhh',
                      
         );
         $id = $modelDisciplina->editarDisciplina($dados);
         $disciplinaAlterada =  $modelDisciplina->find($id)->current();
         $this->assertSame('Biologia', $disciplinaAlterada->getNome());
     }
     
     public function testExcluirDisciplina(){
         $modelDisciplina = new Application_Model_DbTable_Disciplina();
         $numLinhas = $modelDisciplina->removerDisciplina('23');
         $this->assertSame(1, $numLinhas);
         
     }
     
    

}
