<?php

/**
 * Description of Professor
 *
 * @author Bruno
 */
class Application_Model_DbTable_EventoUsuario extends Zend_Db_Table_Abstract {

    protected $_name = 'evento_usuario';
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

}