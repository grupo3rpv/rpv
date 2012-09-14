<?php

/**
 * Description of Professor
 *
 * @author Bruno
 */
class Application_Model_DbTable_EventoUsuario extends Zend_Db_Table_Abstract {

    protected $_name = 'evento_usuario';
    protected $_rowClass = 'Application_Model_EventoUsuario';
    protected $_dependentTables = array('Application_Model_DbTable_Usuario', 'Application_Model_DbTable_Evento');
    
    protected $_referenceMap =  array(
        'Evento'  => array(
            'refTableClass'  => 'Application_Model_DbTable_Evento',
            'columns'        => array('id_evento'),
            'refColumns'     => 'id_evento'
        ),
        'Usuario'   => array(
            'refTableClass'  => 'Application_Model_DbTable_Usuario',
            'columns'        => array('id_professor'),
            'refColumns'     => 'id_usuario'
        )
    );

    public function cadastrarEventoUsuario($dados){
        $modelEventosUsuario = $this->createRow();
        /*@var $modelEventosUsuario Application_Model_EventoUsuario*/
        $modelEventosUsuario->setId_evento($dados['id_evento']);
        $modelEventosUsuario->setId_professor($dados['id_professor']);
        $modelEventosUsuario->setConvite($dados['convite']);
        $modelEventosUsuario->save();
        
    }
    
    public function eventoAceitoPorEmail($dados){
        $eventoUsuario = $this->fetchRow('id_evento ="'.$dados['id_evento'].'" and id_professor = "'.$dados['id_professor'].'"');
        
        if(count($eventoUsuario)>0){
             /*@var $eventoUsuario Application_Model_EventoUsuario*/
             $eventoUsuario->setConvite('confirmado');
             $eventoUsuario->save();
             $eventoUsuarioProprietario = $this->fetchRow('id_evento ="'.$dados['id_evento'].'"  and convite="'.'proprietario'.'"');
             $id_professor = $eventoUsuarioProprietario->getId_professor();
             
         }
        
    }
    
    public function eventoRecusadoPorEmail($dados){
        $eventoUsuario = $this->fetchRow('id_evento ="'.$dados['id_evento'].'" and id_professor = "'.$dados['id_professor'].'"');
        
        if(count($eventoUsuario)>0){
             /*@var $eventoUsuario Application_Model_EventoUsuario*/
             $eventoUsuario->setConvite('recusado');
             $eventoUsuario->save(); 
         }
        
    }
    
    public function respostaEventoAceito($idProfProprietario,$dados,$idProfConvidado){
        $modelProfessor = new Application_Model_DbTable_Professor();
        $professorProprietario = $modelProfessor->listaProfessorPorID($idProfProprietario);
        $emailProprietario = $professorProprietario->getEmail();
        $modelProfessor
        $view = new Zend_View();
        $view->setScriptPath(APPLICATION_PATH . '/views/scripts');
        $msg = $view->partial('templates/conviteeventoconfirmacao.phtml', $dados);
        $mail = new Zend_Mail('utf-8');
        $mail->addTo($emailProprietario)
                    ->setBodyHtml($msg)
                    ->setSubject('Resposta convite partipação de evento')
                    ->send();
       
    }  
}