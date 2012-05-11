<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Disciplina
 *
 * @author Helison
 */
class Application_Form_Disciplina extends Zend_Form {
    
    public function init() {
        $this->setMethod('POST');

        $element = new Zend_Form_Element_Text('id_disciplina');
        $element->setLabel('Identificador: ')
                ->setAttrib('size', '30')
                ->setAttrib('class', 'i-format')
                ->setAttrib('readonly', 'true')
                ->addFilter(new Zend_Filter_StripTags())
                ->setAllowEmpty(false);
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Text('codigo');
        $element->setLabel('Codigo: ')
                ->setAttrib('class', 'i-format');
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Text('nome');
        $element->setLabel('Nome: ')
                ->setAttrib('class', 'i-format');
        $this->addElement($element);

        $element = new Zend_Form_Element_Text('ementa');
        $element->setLabel('Ementa: ')
                ->setAttrib('class', 'i-format');
        $this->addElement($element);

        $element = new Zend_Form_Element_Text('cargaHoraria');
        $element->setLabel('Carga Horária: ')
                ->setAttrib('class', 'i-format');
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Text('infoAdicionais');
        $element->setLabel('Informações Adicionais: ')
                ->setAttrib('class', 'i-format');
        $this->addElement($element);

        
        /**
         * Cria no formulario o botão de "enviar" define tambem o tamanho do mesmo.
         */
        $element = new Zend_Form_Element_Submit('enviar');
        $element->setLabel('Cadastrar Disciplina')
                ->setAttrib('size', '50')
                ->setAttrib('class', 'button normal blue');
        $this->addElement($element);
    }


}

