<?php

class IndexController extends Blog_Controller_Action {

    public function indexAction() {
        $select = $this->consulta();
        $select->order('idpost desc');
        
        $idcategoria = (int)$this->getParam('idcategoria');
        if($idcategoria > 0){
            $select->where('p.idcategoria = '.$idcategoria);
        }
        $posts = $select->query()->fetchAll();
        
        if(!$posts){
            throw new Zend_Controller_Action_Exception();
        }
        
        $this->view->posts = $posts;
        $usuario = $this->getAuthRole();
        $this->view->usuario = $usuario;
    }

    public function categoriasAction() {
        $tab = new Application_Model_DbTable_Categoria();
        $categorias = $tab->fetchAll(null,'idCategoria')->toArray();
        $this->view->categorias = $categorias;
    }

    public function postAction() {
        $idpost = (int) $this->getParam('idpost');
        $select = $this->consulta();
        $select->where('p.idpost = '.$idpost);
        
        $post = $select->query()->fetch();
        
        if(!$post){
            throw new Zend_Controller_Action_Exception();
        }
        $this->view->post = $post;
        
    }
    
    private function consulta(){
        $dbAdapter = Zend_Db_Table_Abstract::getDefaultAdapter();
        $select = $dbAdapter->select()
                ->from(array('p' => 'post'),array('idpost','titulo','texto'))
                ->joinInner(array('c' => 'categoria'), 'c.idcategoria = p.idcategoria',array('categoria'));
        
        return $select;
    }

}
