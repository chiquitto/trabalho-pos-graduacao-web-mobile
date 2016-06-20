<?php

class FilterController extends Blog_Controller_Action {
    public function digitosAction(){
        $v = new Zend_Filter_Digits();
        print_r($v->filter("Valentino Rossi Champion of MotoGP in 2001,2002,2003,2004,2005,2008,2009"));
        exit;
        
    }
    
    public function lowerAction(){
        $v = new Zend_Filter_StringToLower();
        
        echo $v->filter("EDER");
        exit;
    }
    
    public function upperAction(){
        $v = new Zend_Filter_StringToUpper();
        echo $v->filter("eder");
        exit;
    }
    
    public function htmlAction(){
        $valor = "<script>window.location='http://motogp.com';</script>";
        $v = new Zend_Filter_HtmlEntities();
        echo $v->filter($valor);
        //echo $valor;
        exit;
    }
    
    public function zipAction(){
        $d = "E:\\Pos WebMobile\\Framework para PHP\\zf1-blog\\public\\";
        
        $f = new Zend_Filter_Compress(array(
            'adapter' => 'Zip',
            'options' => array(
                'archive' => $d.'/arquivo.zip' 
            )
        ));
        
        echo $f->filter($d.'/index.php');
        exit;
    }
    
    public function filtroAction(){
        $options = array(
            'allowwhitespace' => true
        );
        
        $f = new Zend_Filter();
        $f->addFilter(new Zend_Filter_Alpha($options));
        $f->addFilter(new Zend_Filter_StringToLower());
        $f->addFilter(new Zend_Filter_StringTrim());
        
        echo $f->filter(" Valentino Rossi Campeao do Mundo de MotoGP 5 Vezes ");
        exit;
    }
}

