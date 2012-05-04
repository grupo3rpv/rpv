<?php

class Application_Form_Sala extends Zend_Form {

    public function init() {

        $this->setMethod('POST');
        $element = new Zend_Form_Element_Select(Application_Model_DbTable_TipoSala::getPrimaryKeyName());
        $element->setLabel("Tipo Sala:");
        $element->addMultiOptions(Application_Model_DbTable_TipoSala::getValuesToSelectElement())
                ->setRequired(true);
        $this->addElement($element);

        /**
         * Cria no formulario o campo de "nome" e já atribui o nome do campo na interface.
         */
        //Validador de Email existente
        $validator = new Zend_Validate_Db_NoRecordExists('sala', 'numero');
        // seta a mensagem de erro
        $validator->setMessage('A Sala já existe.');

        $element = new Zend_Form_Element_Text('numero');
        $element->setLabel('Numero:')
                ->setAttrib('size', '30')
                ->addValidator($validator)
                ->setAttrib('class', 'i-format')
                ->addValidator(new Zend_Validate_StringLength(array('max' => 60)))
                ->addFilter(new Zend_Filter_StripTags())
                ->setAllowEmpty(false)
                ->setRequired(true);
        $this->addElement($element);

        $element = new Zend_Form_Element_Text('descricao');
        $element->setLabel('Descrição: ')
                ->setAttrib('class', 'i-format');
        $this->addElement($element);

        $element = new Zend_Form_Element_Text('responsavel');
        $element->setLabel('Responsável: ')
                ->setAttrib('class', 'i-format');
        $this->addElement($element);



        $element = new Zend_Form_Element_Text('capacidade');
        $element->setLabel('Capacidade:')
                ->setAttrib('size', '20')
                ->setAttrib('onkeypress', 'mascara(this,SoNumeros)')
                ->setAttrib('class', 'i-format')
                ->addValidator(new Zend_Validate_Int())
                ->addValidator(new Zend_Validate_GreaterThan(array('min' => 1)));

        $this->addElement($element);

        $element = new Zend_Form_Element_Text('capacidade_desc');
        $element->setLabel('Descrição:')
                ->setAttrib('size', '90')
                ->setAttrib('class', 'i-format')
                ->addFilter(new Zend_Filter_StripTags());
        $this->addElement($element);

        $element = new Zend_Form_Element_Text('info_adicionais');
        $element->setLabel('Informações Adicionais:')
                ->setAttrib('size', '90')
                ->setAttrib('class', 'i-format')
                ->addFilter(new Zend_Filter_StripTags());
        $this->addElement($element);


        $modelEquipamentos = new Application_Model_DbTable_Equipamento();
        $arrayEquipamentos = $modelEquipamentos->listarTodos();
        $lista = array();
        foreach ($arrayEquipamentos as $item) {
//            $lista['id_equipamento'] = $item['id_equipamento'];
//            $lista['descricao'] = $item['descricao'];
            $lista[$item['id_equipamento']] = $item['descricao'];
        }
//        $element = new Zend_Form_Element_Checkbox(Application_Model_DbTable_Equipamento::getPrimaryKeyName());
//        $element->setAttrib('class', 'block_content')
//                ->setOptions($lista)
//                ->setLabel('Selecione os equipamentos da sala:');
//        $this->addElement($element);
//        
        $element = new Zend_Form_Element_MultiCheckbox(Application_Model_DbTable_Equipamento::getPrimaryKeyName());
        $element->setLabel('Selecione os equipamentos da sala:');
        $element->addMultiOptions($lista);
        $this->addElement($element);


        $element = new Zend_Form_Element_Select('status_disponibilidade');
        $element->addMultiOption(true, 'Disponível');
        $element->addMultiOption(false, 'Indisponível');
        $element->setLabel('Status de Disponibilidade para agendamentos:')
                ->setRequired(true)
                ->setAttrib('class', 'block_content');

        $this->addElement($element);







        /**
         * Cria no formulario o botão de "enviar" define tambem o tamanho do mesmo.
         */
        $element = new Zend_Form_Element_Submit('enviar');
        $element->setLabel('Cadastrar sala')
                ->setAttrib('size', '50')
                ->setAttrib('class', 'button normal blue');
        $this->addElement($element);
    }

}

