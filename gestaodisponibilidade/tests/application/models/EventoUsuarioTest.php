<?php

/**
 * Description of EventoTest
 *
 * @author Helison
 */
class Application_Model_EventoUsuarioTest extends PHPUnit_Framework_TestCase {

    public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }
     
    public function testCadastraEventoReuniao() {
            $arrayEvento['data_inicial'] = '25/12/2012';
            $arrayEvento['data_final'] = '25/12/2012';
            $arrayEvento['hora1'] = '12:00';
            $arrayEvento['hora2'] = '14:00';
            $arrayEvento['titulo'] = 'Reunião do teste';
            $arrayEvento['privado'] = 'publico'; 
            
            $modelEvento = new Application_Model_DbTable_Evento();
            $idEvento = $modelEvento->cadastraEvento($arrayEvento);
            
            $modelEventoUsuario = new Application_Model_DbTable_EventoUsuario();
            $dadosProprietario['id_evento'] = $idEvento;
            $dadosProprietario['id_professor']='1';
            $dadosProprietario['convite']='proprietario';
            $modelEventoUsuario->cadastrarEventoUsuario($dadosProprietario);
           
            $dadosConvidado['id_evento'] = $idEvento;
            $dadosConvidado['id_professor']='1';
            $dadosConvidado['convite']='convidado';
            $modelEventoUsuario->cadastrarEventoUsuario($dadosProprietario);
           
            $result = $modelEventoUsuario->fetchAll('id_professor ="1" and id_evento="'.$idEvento.'"');
             
        $this->assertEquals(2, count($result));
    }

    

}