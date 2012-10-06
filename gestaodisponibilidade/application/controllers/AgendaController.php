<?php

class AgendaController extends Zend_Controller_Action {

    public function init() {
        if (Zend_Auth::getInstance()->hasIdentity()) {
            $entity = Zend_Auth::getInstance()->getIdentity();
            if ($entity->tipo_usuario == 'professor' ||
                    $entity->tipo_usuario == 'coordenador' ||
                    $entity->tipo_usuario == 'admin') {
                
            } else {
                $this->_redirect('/login/acesso-negado/');
            }
        } else {
            $this->_redirect('/login/logar/');
        }
    }

    public function indexAction() {
        $sessionUsuario = new Application_Model_SessaoUser();
        $usuario = $sessionUsuario->getSession();
<<<<<<< HEAD
        
        $idProfessor =$usuario->getId_usuario();
=======
        $idProfessor = $usuario->getId_usuario();
>>>>>>> 4c0f2909d3904e53e9967a99ada92b61d27d9e3e
        $arrayEventos = array();

        $usuarioDAO = new Application_Model_DbTable_Usuario();
        /* @var $usuario Application_Model_Usuario */
        $usuario = $usuarioDAO->find($idProfessor)->current();
        //$listaEventos = $usuario->getEventos();
        $listaEventos = $usuario->getEventosConfirmados();

        foreach ($listaEventos as $value) {
            $arrayEventos['dataInicial'][] = $value['data_inicial'];
            $arrayEventos['dataFinal'][] = $value['data_final'];
            $arrayEventos['hora1'][] = $value['hora1'];
            $arrayEventos['hora2'][] = $value['hora2'];
            $arrayEventos['titulo'][] = $value['titulo'];
            $arrayEventos['id_evento'][] = $value['id_evento'];
        }
        $this->view->listaEventos = $arrayEventos;
        $this->view->professor = $usuario;
    }

    public function addEventoAction() {
        $sessionUsuario = new Application_Model_SessaoUser();
        $usuario = $sessionUsuario->getSession();
<<<<<<< HEAD
        
        $idProfessor =$usuario->getId_usuario();
       
=======
        $idProfessor = $usuario->getId_usuario();

>>>>>>> 4c0f2909d3904e53e9967a99ada92b61d27d9e3e
        $proprietario = 'proprietario';
        $dados = $this->getRequest()->getParams();
        $idEvento = $dados['evento'];

        if (isset($idEvento)) {
            $eventoUsuarioDAO = new Application_Model_DbTable_EventoUsuario();
            $usuariosConvidados = $eventoUsuarioDAO->getUsuariosNaoProprietarios($idEvento);
            if (count($usuariosConvidados) == 0 || is_null($usuariosConvidados)) {
                $modelEvento = new Application_Model_DbTable_Evento();
                $evento = $modelEvento->find($idEvento)->current();
                $evento->setData_inicial($dados['data_inicial']);
                $evento->setData_final($dados['data_inicial']);
                $evento->setHora1($dados['hora1']);
                $evento->setHora2($dados['hora2']);
                $evento->setTitulo($dados['titulo']);
                $evento->setPrivado($dados['privado']);

                $evento->save();
                $this->_redirect('/agenda/index/');
            }
        } else {
            unset($dados['controller']);
            unset($dados['action']);
            unset($dados['module']);

            $id_professores = array();
            $id_professores = explode('|', $dados['professoresConvidados']);
            $ultimaPosicaoVetor = count($id_professores) - 1;
            unset($id_professores[$ultimaPosicaoVetor]);
            $modelEvento = new Application_Model_DbTable_Evento();
            $id_evento = $modelEvento->cadastraEvento($dados);

            $arrayEventoUsuarioProprietario = array();
            $arrayEventoUsuarioProprietario['id_professor'] = $idProfessor;
            $modelProf = new Application_Model_DbTable_Professor();
            $nomeP = $modelProf->listaProfessorPorID($idProfessor);
            $nomeProfessorProprietario = $nomeP->getNome();
            $arrayEventoUsuarioProprietario['id_evento'] = $id_evento;
            $arrayEventoUsuarioProprietario['convite'] = $proprietario;
            $modelEventoUsuario = new Application_Model_DbTable_EventoUsuario();
            $modelEventoUsuario->cadastrarEventoUsuario($arrayEventoUsuarioProprietario);

            if (count($id_professores) > 0) {
                for ($index = 0; $index < count($id_professores); $index++) {
                    $arrayEventosUsuarioConvidado = array();
                    $arrayEventosUsuarioConvidado['id_professor'] = $id_professores[$index];
                    $arrayEventosUsuarioConvidado['id_evento'] = $id_evento;
                    $arrayEventosUsuarioConvidado['convite'] = 'convidado';


                    $modelProfessor = new Application_Model_DbTable_Professor();
                    $professor = $modelProfessor->listaProfessorPorID($id_professores[$index]);

                    /* colocar emails falsos */
                    /* Nome convidado, nome proprietario do evento, dia, hora inicial, hora final */
                    $email = $professor->getEmail();
                    $nomeProfessorConvidado = $professor->getNome();
                    $arrayEmail = array();
                    $arrayEmail['convidado'] = $nomeProfessorConvidado;
                    $arrayEmail['proprietarioEvento'] = $nomeProfessorProprietario;
                    $arrayEmail['dia'] = $dados['data_inicial'];
                    $arrayEmail['diaFinal'] = $dados['data_final'];
                    $arrayEmail['horaInicial'] = $dados['hora1'];
                    $arrayEmail['horaFinal'] = $dados['hora2'];
                    $arrayEmail['id_evento'] = $id_evento;
                    $arrayEmail['id_professor'] = $professor->getId_usuario();

                    $mail = new Zend_Mail('utf-8');
                    $mail->setSubject("Você foi convidado para um evento")
                            // colocar o email que deseja testar aq
                            ->addTo($email)
                            ->setBodyHtml($this->view->partial('templates/conviteevento.phtml', $arrayEmail))
                            ->send();

                    /* chamar função que manda o email */
                    $modelEventoUsuario->cadastrarEventoUsuario($arrayEventosUsuarioConvidado);
                }
            }
            $this->_redirect('/agenda/index/');
        }
    }

    public function cadastrarEventoAction() {
         
        $idEvento = $this->getRequest()->getParam('evento');
        $eventoDAO = new Application_Model_DbTable_Evento();
        if (isset($idEvento)) {
            $evento = $eventoDAO->find($idEvento)->current();
            $this->view->evento = $evento;
            $this->view->existe = true;
        } else {
            $evento = $eventoDAO->createRow();
            $this->view->existe = false;
        }

        $professores = new Application_Model_DbTable_Professor();
        $listaDeProfessores = $professores->listaUsuario();
        $arrayProfessores = array();
        foreach ($listaDeProfessores as $item) {
            $arrayProfessores[$item->getId_usuario()] = $item->getNome();
        }
        $this->view->lista = $arrayProfessores;
    }

    public function confirmacaoEventoAction() {
        $id_evento = $this->getRequest()->getParam('34');
        $id_professor = $this->getRequest()->getParam('8634');

        $modelEventoUsuario = new Application_Model_EventoUsuario();
        $dados['id_professor'] = $id_professor;
        $dados['id_evento'] = $id_evento;
        $modelEventoUsuario->eventoAceitoPorEmail($dados);
    }

    public function recusarEventoAction() {
        $id_evento = $this->getRequest()->getParam('34');
        $id_professor = $this->getRequest()->getParam('8634');

        $modelEventoUsuario = new Application_Model_EventoUsuario();
        $dados['id_professor'] = $id_professor;
        $dados['id_evento'] = $id_evento;
        $modelEventoUsuario->eventoRecusadoPorEmail($dados);
    }

}
