<?php

class Application_Model_Cidade {

    public function apagar($idcidade) {
        $tab = new Application_Model_DbTable_Cidade();
        $tab->delete('idcidade = ' . $idcidade);
        
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
