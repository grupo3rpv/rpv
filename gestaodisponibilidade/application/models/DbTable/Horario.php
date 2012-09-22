<?php

/**
 * Description of Horario
 *
 * @author thiago
 */
class Application_Model_DbTable_Horario extends Zend_Db_Table_Abstract {
    
    protected $_name = 'horario';
    protected $_rowClass = 'Application_Model_Horario';
    protected $_primary = 'id_horario';
    
}