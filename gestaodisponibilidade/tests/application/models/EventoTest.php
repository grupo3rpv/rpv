<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of EventoTest
 *
 * @author Helison
 */
class Application_Model_EventoTest extends PHPUnit_Framework_TestCase {
    //put your code here
        public function setUp() {
        $this->bootstrap = new Zend_Application(APPLICATION_ENV, APPLICATION_PATH . '/configs/application.ini');
        parent::setUp();
    }

}

?>
