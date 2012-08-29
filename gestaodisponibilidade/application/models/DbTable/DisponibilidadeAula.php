<?php



/**
 * Description of Professor
 *
 * @author Bruno
 */
class Application_Model_DbTable_DisponibilidadeAula extends Zend_Db_Table_Abstract {

    protected $_rowClass = 'Application_Model_DisponibilidadeAula';
    protected $_name = 'disponibilidade_aula';

    public function gravarDados($id_usuario, $dia, $hora) {
        $disponibilidade = $this->createRow();
        /* @var $disponibilidade Application_Model_DisponibilidadeAula */
        $disponibilidade->setId_usuario($id_usuario);
        $disponibilidade->setDia($dia);
        $disponibilidade->setHora($hora);

        $disponibilidade->save();
    }

    public function removeDados($id_usuario, $dia, $hora) {
        $this->delete('id_usuario = ' . $id_usuario . ' and dia = "' . $dia . '" and hora = "' . $hora . '"');
    }

    public function verificaCelulaSelecionada($id_usuario, $dia, $hora) {
        $select = $this->select()->where('id_usuario = ' . $id_usuario . ' and dia = "' . $dia . '" and hora = "' . $hora . '"');
        return $this->fetchAll($select)->count();
    }

    public function listaDisponibilidadesPorId($id_usuario) {
        $select = $this->select()->where('id_usuario = ' . $id_usuario);
        return $this->fetchAll($select);
    }

}