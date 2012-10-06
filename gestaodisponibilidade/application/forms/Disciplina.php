<?php

/**
 * Description of Disciplina
 *
 * @author Helison
 */
class Application_Form_Disciplina extends Zend_Form {

    public function init() {
        $this->setMethod('POST');

        $element = new Zend_Form_Element_Hidden('id_disciplina');
        $element->setAttrib('size', '30')
                ->setAttrib('class', 'i-format')
                ->setAttrib('readonly', 'true')
                ->addFilter(new Zend_Filter_StripTags())
                ->setAllowEmpty(false);
        $this->addElement($element);

        $element = new Zend_Form_Element_Text('codigo');
        $element->setLabel('Codigo: ')
                ->setAttrib('class', 'i-format')
                ->setRequired(true)
                ->setAllowEmpty(false);
        $this->addElement($element);

        $element = new Zend_Form_Element_Text('nome');
        $element->setLabel('Nome: ')
                ->setAttrib('class', 'i-format')
                ->setRequired(true)
                ->setAllowEmpty(false);
        $this->addElement($element);

        $element = new Zend_Form_Element_Text('ementa');
        $element->setLabel('Ementa: ')
                ->setAttrib('class', 'i-format')
                ->setRequired(true)
                ->setAllowEmpty(false);
        $this->addElement($element);

        $element = new Zend_Form_Element_Text('carga_horaria');
        $element->setLabel('Carga Horária: ')
                ->setAttrib('class', 'i-format');
        $this->addElement($element);

        $element = new Zend_Form_Element_Text('info_adicionais');
        $element->setLabel('Informações Adicionais: ')
                ->setAttrib('class', 'i-format');
        $this->addElement($element);

        $element = new Zend_Form_Element_MultiCheckbox(Application_Model_DbTable_Curso::getPrimaryKeyName());
        $element->setLabel('Selecione os cursos dessa disciplina: ');
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