<?php

class Application_Model_SalaTest extends PHPUnit_Framework_TestCase {
   
    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }
    
   public function testGetNumero(){
       $salaModel = new Application_Model_DbTable_Sala();
       $sala = $salaModel->createRow();
       /* @var $sala Application_Model_Sala */
       $sala->setNumero('3234');
       $this->assertSame('3234', $sala->getNumero());
        
    }
    
     public function testSetGetDescricao(){
       $salaModel = new Application_Model_DbTable_Sala();
       $sala = $salaModel->createRow();
       $sala->setDescricao('teste');
        $this->assertSame('teste', $sala->getDescricao());
        
    }
    
    public function testCadastraSala(){
        $salaModel = new Application_Model_DbTable_Sala();
        $salaArray = array(
            'numero'=>'1000',
            'descricao'=>'Laboratório',
            'capacidade'=>'20',
            'capacidade_desc'=>'pessoas',
            'info_adicionais'=>'sala para fazer teste',
            'status_disponibilidade'=>true,
            'id_tipo_sala'=>'1',
            'responsavel'=>'Bruno',    
         );
        $id_sala = $salaModel->cadastraSala($salaArray);
         /* @var $produto Application_Model_Sala */
         $this->assertSame('1000' ,$id_sala);
    }
    
    public function TestEditarSala(){
        
    }
}

?>
