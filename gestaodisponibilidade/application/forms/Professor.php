<?php

class Application_Form_Professor extends Zend_Form {

    public function init() {

        $this->setMethod('POST');
        $element = new Zend_Form_Element_Select(Application_Model_DbTable_Professor::getPrimaryKeyName());
        $element->setLabel("Professor:");
        $element->addMultiOptions(Application_Model_DbTable_Professor::getValuesToSelectElement())
                ->setRequired(true);
        $this->addElement($element);

        /**
         * Cria no formulario o campo de "nome" e já atribui o nome do campo na interface.
         */
        //Validador de Email existente
        //$validator = new Zend_Validate_Db_NoRecordExists('sala', 'numero');
        // seta a mensagem de erro
        //$validator->setMessage('A Sala já existe.');

        $element = new Zend_Form_Element_Text('id_professor');
        $element->setLabel('Numero:')
                ->setAttrib('size', '30')
                // ->addValidator($validator)
                ->setAttrib('class', 'i-format')
                ->addValidator(new Zend_Validate_StringLength(array('max' => 60)))
                ->addFilter(new Zend_Filter_StripTags())
                ->setAllowEmpty(false)
                ->setRequired(true);
        $this->addElement($element);

        $element = new Zend_Form_Element_Text('nome');
        $element->setLabel('Nome: ')
                ->setAttrib('class', 'i-format');
        $this->addElement($element);

        $element = new Zend_Form_Element_Text('matricula');
        $element->setLabel('Matricula: ')
                ->setAttrib('class', 'i-format');
        $this->addElement($element);


/*
        $modelDisciplina = new Application_Model_DbTable_Disciplina();
        $arrayDisciplinas = $modelDisciplina->listarTodos();
        $lista = array();
        foreach ($arrayDisciplinas as $item) {
            $lista[$item['id_disciplina']] = $item['nome'];
        }
        
        $element = new Zend_Form_Element_MultiCheckbox(Application_Model_DbTable_Disciplina::getPrimaryKeyName());
        $element->setLabel('Selecione as Disciplinas de Interesse:');
        $element->addMultiOptions($lista);
        $this->addElement($element);



        /**
         * Cria no formulario o botão de "enviar" define tambem o tamanho do mesmo.
         */
        $element = new Zend_Form_Element_Submit('enviar');
        $element->setLabel('Cadastrar Professor')
                ->setAttrib('size', '50')
                ->setAttrib('class', 'button normal blue');
        $this->addElement($element);
    }

}

