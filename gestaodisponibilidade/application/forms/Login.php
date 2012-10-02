<?php

class Application_Form_Login extends Zend_Form {

    public function init() {

        $this->setMethod('post');

        $usuario = new Zend_Form_Element_Text('email');
        $usuario->setLabel('Nome de Usuário: ')
                ->setAttrib('size', '30')
                ->setAttrib('class', 'i-format')
                 ->addValidator(new Zend_Validate_EmailAddress())
                ->addValidator(new Zend_Validate_StringLength(array ('max' => 60))) 
                ->setRequired(TRUE);
        $this->addElement($usuario);

        $senha = new Zend_Form_Element_Password('senha');
        $senha->setLabel('Senha:')
                ->setAttrib('size', '30')
                ->setAttrib('class', 'i-format')
                  ->addValidator(new Zend_Validate_StringLength(array ('max' => 8,'min'=>6))) 
                
                //->addValidators(array('alnum'))
                  //->addFilters(array('StripTags', 'HtmlEntities', 'alnum'))
                ->setRequired(TRUE);
        $this->addElement($senha);

        $logar = new Zend_Form_Element_Submit('submit');
        $logar->setLabel('Logar')
                ->setAttrib('class', 'button white large');
        $this->addElement($logar);

    }

}
