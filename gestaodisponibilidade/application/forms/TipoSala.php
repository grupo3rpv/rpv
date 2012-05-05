<?php

class Application_Form_TipoSala extends Zend_Form
{

    public function init()
    {
         $this->setMethod('POST');

        $element = new Zend_Form_Element_Text('id_tipo_sala');
        $element->setLabel('Identificador: ')
                ->setAttrib('size', '30')
                ->setAttrib('class', 'i-format')
                ->setAttrib('readonly', 'true')
                ->addFilter(new Zend_Filter_StripTags())
                ->setAllowEmpty(false);
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Text('descricao');
        $element->setLabel('Descrição: ')
                ->setAttrib('class', 'i-format')
                ->setAllowEmpty(false)
                ->setRequired(true);
        $this->addElement($element);
        
        /**
         * Cria no formulario o botão de "enviar" define tambem o tamanho do mesmo.
         */
        $element = new Zend_Form_Element_Submit('enviar');
        $element->setLabel('Cadastrar')
                ->setAttrib('size', '50')
                ->setAttrib('class', 'button normal blue');
        $this->addElement($element);
    }

    
}

