<?php

class MuralController
extends Blog_Controller_Action {
    
    public function indexAction() {
        $frm = new Application_Form_Mural();
        
        if ($this->getRequest()->isPost()) {
            $params = $this->getAllParams();
            
            if ($frm->isValid($params)) {
                $params = $frm->getValues();
                print_r($params);
                exit;
            }
        }
        
        $this->view->frm = $frm;
    }
    
}