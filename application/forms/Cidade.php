<?php

class Application_Form_Cidade extends Zend_Form {

    public function init() {
        $this->setMethod('post');
        
        $categoria = new Zend_Form_Element_Select('idestado',array(
            'label' => 'Estado',
            'required' => true
        ));
        
        $categoria->setMultiOptions($this->estados());
        //converte valores inteiros 0 em valores null
        $categoria->addFilter(new Zend_Filter_Null());
        $this->addElement($categoria);
        
        $titulo = new Zend_Form_Element_Text('titulo', array(
            'label' => 'Titulo do Post',
            'required' => true
        ));
        $min10 = new Zend_Validate_StringLength(array(
            'min' => 10
        ));
        $titulo->addValidator($min10);        
        $titulo->addFilter(new Zend_Filter_StringToUpper);
        $this->addElement($titulo);
        
        $texto = new Zend_Form_Element_Textarea('texto',array(
            'label' => 'Conteudo',
            'required' => true
        ));
        $this->addElement($texto);
        
        $submit = new Zend_Form_Element_Submit('submit',array(
            'label' => 'Salvar'
        ));
        $this->addElement($submit);
    }
    
    private function categorias(){
        $tab = new Application_Model_DbTable_Estado();
        $estados = $tab->fetchAll(null,'idestado');
        
        $r = array(
            0 => 'Selecione uma opção'
        );
        
        foreach ($estados as $estado){
            // paramos aqui
            $r[$categoria->idcategoria] = $categoria->categoria;
        }
        
        //retorna o array com as categorias
        return $r;
    }

}
