<?php

/**
 * Description of Usuario
 *
 * @author Helison
 */
class Application_Model_Usuario extends Zend_Db_Table_Row_Abstract {
    
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
        var_dump($this->findManyToManyRowset('Application_Model_DbTable_Evento', 'Application_Model_DbTable_EventoUsuario'));
        die();
    }

}
