<?php

class ValidadorController
extends Blog_Controller_Action {
    
    public function digitosAction() {
        $v = new Zend_Validate_Digits();
        $valor = 'fcv';
        
        $resultado = $v->isValid($valor);
        
        if (!$resultado) {
            $erros = $v->getMessages();
            
            print_r($erros);
        }
        
        exit;
    }
    
    public function emailAction() {
        $v = new Zend_Validate_EmailAddress();
        $valor = 'teste@teste';
        
        if (!$v->isValid($valor)) {
            print_r($v->getMessages());
        }
        
        exit;
    }
    
    public function betweenAction() {
        $options = array(
            'inclusive' => false,
            'min' => 18,
            'max' => 40,
        );
        $v = new Zend_Validate_Between($options);
        
        $valor = mt_rand(0, 50);
        
        if (!$v->isValid($valor)) {
            print_r($v->getMessages());
        }
        
        exit;
    }
    
    public function cadeiaAction() {
        $options = array(
            'min' => 10
        );
        
        $v = new Zend_Validate();
        $v->addValidator(new Zend_Validate_Alpha(), true);
        $v->addValidator(new Zend_Validate_StringLength($options));
        
        $valor = 'abcdef';
        
        if (!$v->isValid($valor)) {
            print_r($v->getMessages());
        }
        
        exit;
    }
    
}

















