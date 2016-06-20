<?php

class Application_Model_Categoria {

    public function apagar($idcategoria) {
        //Verifico primeiro se existem registros Post relacionados com esse registro
        $tab = new Application_Model_DbTable_Post();
        $post = $tab->fetchRow('idcategoria = '.$idcategoria);
        
        //caso existam registros relacionados a esse registro da uma excecao
        if($post !== null){
            throw new Exception('Ha Posts cadastrados nessa categoria',1);
        }
        
        //Realizo a exclusao dos dados
        $tab = new Application_Model_DbTable_Categoria();
        $tab->delete('idcategoria = '.$idcategoria);
        
        return true;
        
    }

    public function atualizar(Application_Model_Vo_Categoria $categoria) {
        //instanciando a classe que representa a tabela no BD
        $tab = new Application_Model_DbTable_Categoria();
        
        //atualizando um registro na tabela categoria
        $tab->update(array(
            'categoria' => $categoria->getCategoria()
        ), 'idcategoria = '.$categoria->getIdcategoria());
        
        return true;
    }

    public function salvar(Application_Model_Vo_Categoria $categoria) {
        //instanciando a classe que representa a tabela no BD.
        $tab = new Application_Model_DbTable_Categoria();
        $tab->insert(array(
            'categoria' => $categoria->getCategoria()
        ));
        
        $categoria->setIdcategoria($tab->getAdapter()->lastInsertId());
        
        return true;
    }

}
