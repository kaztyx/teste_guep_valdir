<?php

namespace Model;

use Model\Servicos;
use Model\DbConecta;
use PDO;

class AcessoDb {

    public function selectAllPessoas($order) {
        if ( !isset($order) ) {
            $order = "nome";
        }

        $conn = DbConecta::conecta();

        $dbOrder =  $order;

        $query = $conn->prepare("SELECT * 
                                 FROM pessoa
                                 INNER JOIN grupo_pessoa ON grupo_pessoa.idpessoa = pessoa.id
                                 INNER JOIN grupo ON grupo.id = grupo_pessoa.idgrupo");

        //$query = $conn->prepare("SELECT * FROM pessoa ORDER BY $dbOrder ASC");

        $query->execute();
       
        $pessoas = $query->fetchAll(PDO::FETCH_ASSOC);

        return $pessoas;
    }
    
    public function selectByIdPessoa($id) {

        $dbId = $id;

        $conn = DbConecta::conecta();

        $query = $conn->prepare("SELECT * FROM pessoa WHERE id=$dbId");

        $query->execute();

        $pessoa = $query->fetch(PDO::FETCH_ASSOC);
        
        return $pessoa;
		
    }
    
    //===================
    // não implementado
    //===================
    public function selectAllGrupoPessoa($id) {

        $dbId = $id;

        $conn = DbConecta::conecta();

        $query = $conn->prepare("SELECT grupo 
                                 FROM grupo
                                 INNER JOIN grupo_pessoa ON grupo_pessoa.idgrupo = grupo.id
                                 INNER JOIN pessoa ON pessoa.id = grupo_pessoa.idpessoa
                                 WHERE pessoa.id=$dbId");

        $query->execute();

        $grupos = $query->fetchAll(PDO::FETCH_ASSOC);
        
        return $grupos;
        
    }
    //===================
    // não implementado
    //===================



    
    public function insertPessoa( $nome, $sobrenome, $grupos ) {

        $dbNome = ($nome != NULL)?"'".$nome."'":'NULL';
        $dbSobrenome = ($sobrenome != NULL)?"'".$sobrenome."'":'NULL';
        $dbGrupo = ($grupos != NULL)?"'".$grupos."'":'NULL';

        date_default_timezone_set('America/Sao_Paulo');

        $conn = DbConecta::conecta();

        $query = $conn->prepare("INSERT INTO pessoa (nome, sobrenome, grupos, created_at, updated_at) VALUES ($dbNome, $dbSobrenome, $dbGrupo, now(), now())");

        $query->execute();

        $last_id = $conn->lastInsertId();
         
        return $last_id;
    }

    
    public function insertGrupoPessoa ($id , $grupos) {

        $dbId = $id;

        print_r($grupos);

        $conn = DbConecta::conecta();

        $query = $conn->prepare("INSERT INTO grupo_pessoa (idgrupo, idpessoa) VALUES ( ?, $dbId)");

        $query->bindParam("i", $grupo);
        
        foreach ($grupos as $grupo) {
            $query->execute(array($grupo)); 
        }

        return $query->insert_id;

    }




    public function updatePessoa($id, $nome, $sobrenome, $grupo) {
        
        $dbId = $id;

        $dbNome = ($nome != NULL)?"'".$nome."'":'NULL';
        $dbSobrenome = ($sobrenome != NULL)?"'".$sobrenome."'":'NULL';
        $dbGrupo = ($grupos != NULL)?"'".$grupos."'":'NULL';

        $conn = DbConecta::conecta();

        $query = $conn->prepare("UPDATE pessoa SET nome = $dbNome , sobrenome = $dbSobrenome , grupos = $dbGrupo, updated_at = now() WHERE id=$dbId");

        $query->execute();
       
    }
    
    public function deletePessoa($id) {
        $dbId = $id;
        $conn = DbConecta::conecta();

        $query = $conn->prepare("DELETE FROM pessoa WHERE id=$dbId");

        $query->execute();
    }

    public function selectAllGrupos($order) {
        if ( !isset($order) ) {
            $order = "grupo";
        }

        $conn = DbConecta::conecta();

        $dbOrder =  $order;

        $query = $conn->prepare("SELECT * FROM grupo ORDER BY $dbOrder ASC");

        $query->execute();
       
        $grupos = $query->fetchAll(PDO::FETCH_ASSOC);

        return $grupos;
    }

    
    public function selectByIdGrupo($id) {
        $dbId = $id;

        $conn = DbConecta::conecta();

        $query = $conn->prepare("SELECT * FROM grupo WHERE id=$dbId");

        $query->execute();

        $grupo = $query->fetch(PDO::FETCH_ASSOC);
        
        return $grupo;
        
    }
    
    public function insertGrupo( $grupo, $descr) {
        
        $dbGrupo = ($grupo != NULL)?"'".$grupo."'":'NULL';
        $dbDescr = ($descr != NULL)?"'".$descr."'":'NULL';

        $conn = DbConecta::conecta();

        $query = $conn->prepare("INSERT INTO grupo (grupo, descr) VALUES ($dbGrupo, $dbDescr)");

        $query->execute();
        
        return $query->insert_id;
    }

    public function updateGrupo($id, $grupo, $descr) {
        
        $dbId = $id;

        $dbGrupo = ($grupo != NULL)?"'".$grupo."'":'NULL';
        $dbDescr = ($descr != NULL)?"'".$descr."'":'NULL';

        $conn = DbConecta::conecta();

        $query = $conn->prepare("UPDATE grupo SET grupo = $dbGrupo , descr = $dbDescr WHERE id=$dbId");

        $query->execute();
       
    }
    
    public function deleteGrupo($id) {
        $dbId = $id;

        $conn = DbConecta::conecta();

        $query = $conn->prepare("DELETE FROM grupo WHERE id=$dbId");

        $query->execute();
        
    }
    
}

?>