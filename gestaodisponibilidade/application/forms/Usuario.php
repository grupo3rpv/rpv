<?php

class Application_Form_Usuario extends Zend_Form {

    public function init() {

        $this->setMethod('POST');
        $element = new Zend_Form_Element_Select(Application_Model_DbTable_Professor::getPrimaryKeyName());
        $element->setLabel("Professor:");
        $element->addMultiOptions(Application_Model_DbTable_Professor::getValuesToSelectElement())
                ->setRequired(true);
        $this->addElement($element);

        $element = new Zend_Form_Element_Hidden('id_usuario');
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

        $element = new Zend_Form_Element_Text('matricula');
        $element->setLabel('Matricula: ')
                ->setAttrib('class', 'i-format');
        $this->addElement($element);

        $element = new Zend_Form_Element_Select(Application_Model_DbTable_Area::getPrimaryKeyName());
        $element->setLabel('Áreas disponíveis: ')
                ->setAttrib('class', 'select')
                ->setAttrib('size', '14');
        $this->addElement($element);

        $element = new Zend_Form_Element_Button('adicionar');
        $element->setLabel('Adicionar área')
                ->setAttrib('size', '50')
                ->setAttrib('class', 'button normal green')
                ->setAttrib('onClick', 'adicionaAreaInteresse()');
        $this->addElement($element);

        $element = new Zend_Form_Element_Multiselect(Application_Model_DbTable_AreaProfessor::getPrimaryKeyName());
        $element->setLabel('Áreas selecionadas: ')
                ->setAttrib('class', 'select')
                ->setAttrib('size', '14')
                ->setRegisterInArrayValidator(false);
        $this->addElement($element);
        
        $element = new Zend_Form_Element_Button('remover');
        $element->setLabel('Remover área')
                ->setAttrib('size', '50')
                ->setAttrib('class', 'button normal red')
                ->setAttrib('onClick', 'removerAreaInteresse()');
        $this->addElement($element);

        /**
         * Cria no formulario o botão de "enviar" define tambem o tamanho do mesmo.
         */
        $element = new Zend_Form_Element_Submit('enviar');
        $element->setLabel('Atualizar dados')
                ->setAttrib('size', '50')
                ->setAttrib('onClick', 'selecionarTodosElementos()')
                ->setAttrib('class', 'button normal blue');
        $this->addElement($element);
    }

}