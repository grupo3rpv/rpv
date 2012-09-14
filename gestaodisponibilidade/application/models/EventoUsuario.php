<?php

/**
 * Description of Area
 *
 * @author Marcelo
 */
class Application_Model_EventoUsuario extends Zend_Db_Table_Row_Abstract {
 
   
    public function getId_evento() {
        return $this->id_evento;
    }

    public function setId_evento($id_evento) {
        $this->id_evento = $id_evento;
    }

    public function getId_professor() {
        return $this->id_professor;
    }

    public function setId_professor($id_professor) {
        $this->id_professor = $id_professor;
    }

    public function getConvite() {
        return $this->convite;
    }

    public function setConvite($convite) {
        $this->convite = $convite;
    }

    public function eventoAceitoPorEmail($dados){
        $modelEventoUsuario = new Application_Model_DbTable_EventoUsuario();
        $eventoUsuario = $modelEventoUsuario->fetchRow('id_evento ="'.$dados['id_evento'].'" and id_professor = "'.$dados['id_professor'].'"');
        
        if(count($eventoUsuario)>0){
             /*@var $eventoUsuario Application_Model_EventoUsuario*/
             $eventoUsuario->setConvite('confirmado');
             $eventoUsuario->save();
             $eventoUsuarioProprietario = $modelEventoUsuario->fetchRow('id_evento ="'.$dados['id_evento'].'"  and convite="'.'proprietario'.'"');
             $idProfProprietario = $eventoUsuarioProprietario->getId_professor();
             $aceito = true;
             $this->respostaEvento($idProfProprietario, $dados['id_professor'], $dados['id_evento'],$aceito);
             
         }
        
    }
    
    public function eventoRecusadoPorEmail($dados){
        $modelEventoUsuario = new Application_Model_DbTable_EventoUsuario();
        $eventoUsuario = $modelEventoUsuario->fetchRow('id_evento ="'.$dados['id_evento'].'" and id_professor = "'.$dados['id_professor'].'"');
        
        if(count($eventoUsuario)>0){
             /*@var $eventoUsuario Application_Model_EventoUsuario*/
             $eventoUsuario->setConvite('recusado');
             $eventoUsuario->save();
             $eventoUsuarioProprietario = $modelEventoUsuario->fetchRow('id_evento ="'.$dados['id_evento'].'"  and convite="'.'proprietario'.'"');
             $idProfProprietario = $eventoUsuarioProprietario->getId_professor();
             $aceito = false;
             $this->respostaEvento($idProfProprietario, $dados['id_professor'], $dados['id_evento'],$aceito);
             
         }
        
    }
    
    public function respostaEvento($idProfProprietario,$idProfConvidado,$idEvento,$aceito){
        $modelProfessor = new Application_Model_DbTable_Professor();
        $professorProprietario = $modelProfessor->listaProfessorPorID($idProfProprietario);
        $emailProprietario = $professorProprietario->getEmail();
        $nomeProprietario = $professorProprietario->getNome();
        
        $professorConvidado = $modelProfessor->listaProfessorPorID($idProfConvidado);
        $nomeProfessorConvidado = $professorConvidado->getNome();
        
        $modelEvento = new Application_Model_DbTable_Evento();
        $evento = $modelEvento->find($idEvento)->current();
                    $arrayEmail['convidado'] =$nomeProfessorConvidado;
                    $arrayEmail['proprietarioEvento'] =$nomeProprietario;
                    $arrayEmail['dia'] =$evento->getData_inicial();
                    $arrayEmail['diaFinal'] =$evento->getData_final();
                    $arrayEmail['horaInicial'] =$evento->getHora1();
                    $arrayEmail['horaFinal'] =$evento->getHora2();
        $view = new Zend_View();
        $view->setScriptPath(APPLICATION_PATH . '/views/scripts');
        if($aceito){
        $msg = $view->partial('templates/conviteeventoconfirmacao.phtml', $arrayEmail);
        }
        else{
        $msg = $view->partial('templates/conviteeventorecusado.phtml', $arrayEmail);    
        }
        $mail = new Zend_Mail('utf-8');
        $mail->addTo($emailProprietario)
                    ->setBodyHtml($msg)
                    ->setSubject('Resposta convite partipação de evento')
                    ->send();
       
    }

    
    
}
