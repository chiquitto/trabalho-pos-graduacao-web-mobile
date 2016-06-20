<?php

class Application_Model_Post {

    public function apagar($idpost) {
        
        $tab = new Application_Model_DbTable_Post();
        $tab->delete('idpost = '.$idpost);
        return true;
    }

    public function atualizar(Application_Model_Vo_Post $post) {
        $tab = new Application_Model_DbTable_Post();
        $tab->update(array(
            'idcategoria' => $post->getIdcategoria(),
            'idadmin' => $post->getIdadmin(),
            'titulo' => $post->getTitulo(),
            'texto' => $post->getTexto()
        ), 'idpost = '.$post->getIdpost());
        return true;
    }

    public function salvar(Application_Model_Vo_Post $post) {
        //instancio uma conexao com a tabela
        $tab = new Application_Model_DbTable_Post();
        //faco a insercao na tabela
        $tab->insert(array(
            'idcategoria' => $post->getIdcategoria(),
            'idadmin' => $post->getIdadmin(),
            'titulo' => $post->getTitulo(),
            'texto' => $post->getTexto()
        ));
        
        $post->setIdpost($tab->getAdapter()->lastInsertId());
        //retorna true se tudo ocorrer bem
        return true;
    }

}
