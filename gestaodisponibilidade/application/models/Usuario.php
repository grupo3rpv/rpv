<?php

/**
 * Description of Usuario
 *
 * @author Helison
 */
class Application_Model_Usuario extends Zend_Db_Table_Row_Abstract {

    protected $eventos;

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }

    public function getId_usuario() {
        return $this->id_usuario;
    }

    public function setId_usuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function getNome() {
        return $this->nome;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function getEventos() {
        if (is_null($this->eventos)) {
            $this->eventos = $this->findManyToManyRowset('Application_Model_DbTable_Evento', 'Application_Model_DbTable_EventoUsuario');
        }
        return $this->eventos;
    }

    public function getEventosConfirmados() {
        $select = $this->select()->where('id_professor = ?', $this->getId_usuario())
                ->where('convite = ?', 'proprietario')
                ->orWhere('convite = ?', 'confirmado');
        $this->eventos = $this->findManyToManyRowset('Application_Model_DbTable_Evento', 'Application_Model_DbTable_EventoUsuario', null, null, $select);
        return $this->eventos;
    }

    public function getHorarios() {
        return $this->findManyToManyRowset('Application_Model_DbTable_Horario', 'Application_Model_DbTable_HorarioProfessor');
    }

}
