<?php

class Application_Model_NivelInteresseTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

     public function testCadastroNivelInteresse(){
         $modelNivelInteresse = new Application_Model_DbTable_NivelInteresse();
         $dados = array(
             'id_nivelInteresse'=>'1',
             'id_professor'=>'1',
             'id_disciplina' => '1',
             'nivel_interesse' => '5',
         );
         $id = $modelNivelInteresse->cadastraNivelInteresse($dados);
     
         $this->assertSame('1', $id);
         
     }
     
     public function testGetId_nivelInteresse() {
        $modelNivelInteresse = new Application_Model_DbTable_NivelInteresse();
        $nivelInteresse = $modelNivelInteresse->createRow();
        $nivelInteresse->setId_nivelInteresse(2);
        $this->assertSame(2, $nivelInteresse->getId_nivelInteresse());
    }

    public function testGetId_professor() {
        $modelNivelInteresse = new Application_Model_DbTable_NivelInteresse();
        $nivelInteresse = $modelNivelInteresse->createRow();
        $nivelInteresse->setId_professor(2);
        $this->assertSame(2, $nivelInteresse->getId_professor());
    }
    
    
}
