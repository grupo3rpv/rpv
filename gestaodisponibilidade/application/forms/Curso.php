<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Curso
 *
 * @author Helison
 */
class Application_Form_Curso extends Zend_Form {
    
    public function init() {
        $this->setMethod('POST');

        $element = new Zend_Form_Element_Hidden('id_curso');
        $element->setAttrib('size', '30')
                ->setAttrib('class', 'i-format')
                ->setAttrib('readonly', 'true')
                ->addFilter(new Zend_Filter_StripTags())
                ->setAllowEmpty(false);
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Text('nome');
        $element->setLabel('Nome: ')
                ->setAttrib('class', 'i-format');
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Text('codigo');
        $element->setLabel('Codigo: ')
                ->setAttrib('class', 'i-format');
        $this->addElement($element);
        
        /**
         * Cria no formulario o botão de "enviar" define tambem o tamanho do mesmo.
         */
        $element = new Zend_Form_Element_Submit('enviar');
        $element->setLabel('Cadastrar Curso')
                ->setAttrib('size', '50')
                ->setAttrib('class', 'button normal blue');
        $this->addElement($element);
    }


}

?>
