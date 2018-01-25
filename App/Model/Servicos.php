<?php

namespace Model;

use Model\AcessoDb;
use Model\ValidationException;
use Model\DbConecta;

use Exception;

class Servicos {
    
    private $acessoDb    = NULL;

    public function __construct() {
        $this->acessoDb = new AcessoDb();
    }
    
   
    private function openDb() {

        $conn = DbConecta::conecta();

        

        if (!$conn) {
            throw new Exception("Conexão com o banco de dados falhou!");
        }
        
        
    }
    
    private function closeDb() {
        
        $conn = NULL;
       
    }
  
    
    
    public function getAllPessoas($order) {
        try {
            $this->openDb();
            $res = $this->acessoDb->selectAllPessoas($order);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }


    public function getAllGrupoPessoa($id) {
        try {
            $this->openDb();
            $res = $this->acessoDb->selectAllGrupoPessoa($order);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    public function getPessoa($id) {
        try {
            $this->openDb();
            $res = $this->acessoDb->selectByIdPessoa($id);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
        return $this->pessoasAcesso->find($id);
    }
    
    private function validatePessoaParams( $nome, $sobrenome, $grupos  ) {
        $errors = array();
        if ( !isset($nome) || empty($nome) ) {
            $errors[] = 'Nome é requerido';
        }
        if ( empty($errors) ) {
            return;
        }
        throw new ValidationException($errors);
    }
    
    public function createPessoa( $nome, $sobrenome, $grupos ) {
        try {
            $this->openDb();
            $this->validatePessoaParams($nome, $sobrenome, $grupos);
            $res = $this->acessoDb->insertPessoa($nome, $sobrenome, $grupos);
            $result = $this->acessoDb->insertGrupoPessoa($res, $grupos);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }

    public function updatePessoa($id, $nome, $sobrenome, $grupos ) {
        try {
            $this->openDb();
            $res = $this->acessoDb->updatePessoa($id, $nome, $sobrenome, $grupos);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    public function deletaPessoa( $id ) {
        try {
            $this->openDb();
            $res = $this->acessoDb->deletePessoa($id);
            $this->closeDb();
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }


    public function getAllGrupos($order) {
        try {
            $this->openDb();
            $res = $this->acessoDb->selectAllGrupos($order);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    public function getGrupo($id) {
        try {
            $this->openDb();
            $res = $this->acessoDb->selectByIdGrupo($id);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
        return $this->acessoDb->find($id);
    }
    
    private function validateGrupoParams( $grupo, $descr ) {
        $errors = array();
        if ( !isset($grupo) || empty($grupo) ) {
            $errors[] = 'Grupo é requerido';
        }
        if ( empty($errors) ) {
            return;
        }
        throw new ValidationException($errors);
    }
    
    public function createGrupo( $grupo, $descr ) {
        try {
            $this->openDb();
            $this->validateGrupoParams($grupo , $descr );
            $res = $this->acessoDb->insertGrupo($grupo, $descr);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }

    public function updateGrupo($id, $grupo, $descr ) {
        try {
            $this->openDb();
            $res = $this->acessoDb->updateGrupo($id, $grupo, $descr);
            $this->closeDb();
            return $res;
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    public function deletaGrupo( $id ) {
        try {
            $this->openDb();
            $res = $this->acessoDb->deleteGrupo($id);
            $this->closeDb();
        } catch (Exception $e) {
            $this->closeDb();
            throw $e;
        }
    }
    
    
}

?>