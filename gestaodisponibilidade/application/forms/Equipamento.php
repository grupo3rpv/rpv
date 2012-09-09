<?php

class Application_Form_Equipamento extends Zend_Form {

    public function init() {
        $this->setMethod('POST');

        $element = new Zend_Form_Element_Hidden('id_equipamento');
        $element->setAttrib('size', '30')
                ->setAttrib('class', 'i-format')
                ->setAttrib('readonly', 'true')
                ->addFilter(new Zend_Filter_StripTags())
                ->setAllowEmpty(false);
        $this->addElement($element);

        $element = new Zend_Form_Element_Text('descricao');
        $element->setLabel('Descrição: ')
                ->setAttrib('class', 'i-format')
                ->setRequired(true)
                ->setAllowEmpty(false);
        $this->addElement($element);

        /**
         * Cria no formulario o botão de "enviar" define tambem o tamanho do mesmo.
         */
        $element = new Zend_Form_Element_Submit('enviar');
        $element->setLabel('Cadastrar equipamento')
                ->setAttrib('size', '50')
                ->setAttrib('class', 'button normal orange');
        $this->addElement($element);
    }

}

