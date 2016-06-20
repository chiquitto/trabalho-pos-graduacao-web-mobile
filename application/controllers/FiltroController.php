<?php

class FiltroController extends Blog_Controller_Action {

    public function digitosAction() {
        $f = new Zend_Filter_Digits();
        $valor = '07/05/2016';
        
        echo $f->filter($valor);
        
        exit;
    }
    
    public function lowerAction() {
        $f = new Zend_Filter_StringToLower();
        
        echo $f->filter('PR');
        
        exit;
    }
    
    public function htmlAction() {
        $valor = "<script>window.location='http://google.com';</script>";
        $valor = "<strong>Brasil</strong>";
        $f = new Zend_Filter_HtmlEntities();
        
        echo $f->filter($valor);
        exit;
    }
    
    public function zipAction() {
        $d = '/home/alisson/aula/fcv/pos-web-2016/zf1-blog/public';
        
        $f = new Zend_Filter_Compress(array(
            'adapter' => 'Zip',
            'options' => array(
                'archive' => $d . '/arquivo.zip'
            )
        ));
        
        echo $f->filter($d . '/index.php');
        exit;
    }
    
    public function filtroAction() {
        $options = array(
            'allowwhitespace' => true
        );
        
        $f = new Zend_Filter();
        $f->addFilter(new Zend_Filter_Alpha($options));
        $f->addFilter(new Zend_Filter_StringToLower());
        $f->addFilter(new Zend_Filter_StringTrim());
        
        echo $f->filter('   Olimpiadas Brasil 2016   ');
        exit;
    }

}















