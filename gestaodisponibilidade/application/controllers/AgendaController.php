<?php

class AgendaController extends Zend_Controller_Action {

    public function init() {
        /* Initialize action controller here */
    }

    public function indexAction() {
        $id_professor = '1';
        $arrayEventos = array();

        /* $modelProfessor = new Application_Model_DbTable_Professor();
          $professor = $modelProfessor->find($id_professor)->current();
          $modelEvento = new Application_Model_DbTable_Evento();
          $listaEventos = $modelEvento->listaEventosPorIdProfessor('1'); */

        $usuarioDAO = new Application_Model_DbTable_Usuario();
        /* @var $usuario Application_Model_Usuario */
        $usuario = $usuarioDAO->find($id_professor)->current();
        $listaEventos = $usuario->getEventos();

        foreach ($listaEventos as $value) {

            $arrayEventos['dataInicial'][] = $value['data_inicial'];
            $arrayEventos['dataFinal'][] = $value['data_inicial'];
            $arrayEventos['hora1'][] = $value['hora1'];
            $arrayEventos['hora2'][] = $value['hora2'];
            $arrayEventos['titulo'][] = $value['titulo'];
            $arrayEventos['id_evento'][] = $value['id_evento'];
        }
        $this->view->listaEventos = $arrayEventos;
        //$this->view->professor = $professor;
        $this->view->professor = $usuario;
    }

    public function addEventoAction() {
            $proprietario = 'proprietario';
            $dados = $this->getRequest()->getParams();
            unset($dados['controller']);
            unset($dados['action']);
            unset($dados['module']);
            
            $id_professores = array();
            $id_professores = explode('|', $dados['professoresConvidados']);
            $ultimaPosicaoVetor =count($id_professores)-1;
            unset($id_professores[$ultimaPosicaoVetor]);
            $modelEvento = new Application_Model_DbTable_Evento();
            $id_evento = $modelEvento->cadastraEvento($dados);
            
            $arrayEventoUsuarioProprietario = array();
            $arrayEventoUsuarioProprietario['id_professor'] = '1';
            $arrayEventoUsuarioProprietario['id_evento'] = $id_evento;
            $arrayEventoUsuarioProprietario['convite']= $proprietario;
            $modelEventoUsuario = new Application_Model_DbTable_EventoUsuario();
            $modelEventoUsuario->cadastrarEventoUsuario($arrayEventoUsuarioProprietario);
            
            if(count($id_professores)>0){
                for ($index = 0; $index < count($id_professores); $index++) {
                    $arrayEventosUsuarioConvidado = array();
                    $arrayEventosUsuarioConvidado['id_professor']=$id_professores[$index];
                    $arrayEventosUsuarioConvidado['id_evento']=$id_evento;
                    $arrayEventosUsuarioConvidado['convite']='convidado';
                   
                    $arrayEmail = array();
                    $arrayEmail['convidado'] ='Marcelo Maia';
                    $arrayEmail['proprietarioEvento'] ='Helisson';
                    $arrayEmail['dia'] ='10/10/10';
                    $arrayEmail['horaInicial'] ='09:00';
                    $arrayEmail['horaFinal'] ='11:00';
                    
                    
                    
                    
                    $modelProfessor = new Application_Model_DbTable_Professor();
                    $professor = $modelProfessor->listaProfessorPorID($id_professores[$index]);
                    /*colocar emails falsos*/
                    /*Nome convidado, nome proprietario do evento, dia, hora inicial, hora final*/
                    $email = $professor->getEmail();
                    $mail = new Zend_Mail('utf8');
                    $mail->setSubject("Você foi convidado para um evento")
                    ->setFrom('contato.meucontrole@gmail.com')
                    ->addTo('brunodosax@hotmail.com')
                    ->setBodyHtml($this->view->partial('templates/conviteevento.phtml',$arrayEmail))
                    ->send(); 
                    var_dump($email);die();
                    /*chamar função que manda o email*/
                    $modelEventoUsuario->cadastrarEventoUsuario($arrayEventosUsuarioConvidado);
                }
            }
            
            
           
            
           
            
//
//            $modelEvento->cadastraEvento($dados);
//            $this->_redirect('/agenda/index');
        
    }

    public function cadastrarEventoAction() {
        $professores = new Application_Model_DbTable_Professor();
        $listaDeProfessores = $professores->listaUsuario();
        $arrayProfessores = array();
        foreach ($listaDeProfessores as $item) {
            $arrayProfessores[$item->getId_usuario()] = $item->getNome();
        }
        $this->view->lista = $arrayProfessores;
    }
}