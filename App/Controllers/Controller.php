<?php

namespace Controllers;

use Model\Servicos;
use Model\DbConecta;


class Controller {
    
    private $servicos = NULL;


    public function __construct() {
        $this->servicos = new Servicos();
    }


    public function redirect($location) {
        header('Location: '.$location);
    }
    
    public function handleRequest() {
        $op = isset($_GET['op'])?$_GET['op']:NULL;
        try {
            if ( !$op || $op == 'home') {
                $this->viewHome();
            } elseif ( $op == 'lista-pessoas' ) {
                $this->listaPessoas();    
            } elseif ( $op == 'nova-pessoa' ) {
                $this->salvaPessoa();
            } elseif ( $op == 'deleta-pessoa' ) {
                $this->deletaPessoa();
            } elseif ( $op == 'mostra-pessoa' ) {
                $this->mostraPessoa();
            
            } elseif ( $op == 'lista-grupos' ) {
                $this->listaGrupos();    
            } elseif ( $op == 'novo-grupo' ) {
                $this->salvaGrupo();
            } elseif ( $op == 'deleta-grupo' ) {
                $this->deletaGrupo();
            } elseif ( $op == 'mostra-grupo' ) {
                $this->mostraGrupo();

            } else {
                $this->showError("Página não encontrada", "Página para a operação ".$op." não foi encontrada!");
            }
        } catch ( Exception $e ) {
            // some unknown Exception got through here, use application error page to display it
            $this->showError("Erro da Aplicação", $e->getMessage());
        }
    }

    public function viewHome() {
        include 'View/home.php';

    }
    
    public function listaPessoas() {
        $orderby = isset($_GET['orderby'])?$_GET['orderby']:NULL;
        $pessoas = $this->servicos->getAllPessoas($orderby);
        //$grupos = $this->servicos->getAllGrupoPessoa($orderby); //não implementado
        include 'View/lista_pessoas.php';
    }
    
    public function salvaPessoa() {
       
        $title = 'Adiciona nova Pessoa...';
        
        $nome = '';
        $sobrenome = '';
        $grupo = '';
     
        $gruposAll = $this->servicos->getAllGrupos($orderby);

       
        $errors = array();
        
        if ( isset($_POST['form-submitted']) ) {
      
            $nome       = isset($_POST['nome']) ?   $_POST['nome']  :NULL;
            $sobrenome  = isset($_POST['sobrenome'])?   $_POST['sobrenome'] :NULL;
            $grupos      = isset($_POST['grupos'])?   $_POST['grupos'] :NULL;


            //comprimento de caracteres nos campos
            $lenghtNome =  strlen ($nome);
            $lenghtSobrenome =  strlen ($sobrenome);

            // contar numero de grupos selecionados
            $qtdGrupo = count($grupos);
            
            try{ 

                    if ($lenghtNome < 3 || $lenghtNome > 50) {
                       $this->showError("O campo NOME não é válido!", "O NOME precisa no mínimo de 3 caracteres e no máximo 50 caracteres!"); 
                    } elseif ($lenghtSobrenome < 3 || $lenghtSobrenome > 100) {
                       $this->showError("O campo SOBRENOME não é válido! ", "O SOBRENOME precisa no mínimo de 3 caracteres e no máximo 100 caracteres!"); 
                    } elseif ($qtdGrupo < 2 ){

                        $this->showError("Número de Grupos Insuficientes", "Você precisa no mínimo de 2 grupos selecionados!");

                    } else {

                        $this->servicos->createPessoa($nome, $sobrenome, $grupos);
                        $this->redirect('index.php?op=lista-pessoas');
                        return;
                    }
                } catch ( Exception $e ) {
                        $errors = $e->getErrors();
                    }
           
        }
        
        include 'View/form-pessoa.php';
    }


    public function mostraPessoa() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Erro interno.');
        }
        $pessoa = $this->servicos->getPessoa($id);

        $gruposAll = $this->servicos->getAllGrupos($orderby);

        if ( isset($_POST['form-submitted']) ) {
            
            $nome       = isset($_POST['nome']) ?   $_POST['nome']  :NULL;
            $sobrenome  = isset($_POST['sobrenome'])?   $_POST['sobrenome'] :NULL;
            $grupos      = isset($_POST['grupos'])?   $_POST['grupos'] :NULL;

            
            //comprimento de caracteres nos campos
            $lenghtNome =  strlen ($nome);
            $lenghtSobrenome =  strlen ($sobrenome);

            // contar numero de grupos selecionados
            $qtdGrupo = count($grupos);
            
            try{ 

                    if ($lenghtNome < 3 || $lenghtNome > 50) {
                       $this->showError("O campo NOME não é válido!", "O NOME precisa no mínimo de 3 caracteres e no máximo 50 caracteres!"); 
                    } elseif ($lenghtSobrenome < 3 || $lenghtSobrenome > 100) {
                       $this->showError("O campo SOBRENOME não é válido! ", "O SOBRENOME precisa no mínimo de 3 caracteres e no máximo 100 caracteres!"); 

                    } else {

                        $this->servicos->updatePessoa($id, $nome, $sobrenome, $grupos);
                        $this->redirect('index.php?op=lista-pessoas');
                        return;
                    }
                } catch ( Exception $e ) {
                        $errors = $e->getErrors();
                    }
           
        }
        
        include 'View/mostra_pessoa.php';
    }
    
    public function deletaPessoa() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Erro interno.');
        }
        
        $this->servicos->deletaPessoa($id);
        
        $this->redirect('index.php?op=lista-pessoas');
    }
    
    

    public function listaGrupos() {
        $orderby = isset($_GET['orderby'])?$_GET['orderby']:NULL;
        $grupos = $this->servicos->getAllGrupos($orderby);
        include 'View/lista_grupos.php';
    }
    
    public function salvaGrupo() {
       
        $title = 'Adiciona novo Grupo';
        
        $grupo = '';
        $descr = '';
       
        $errors = array();
        
        if ( isset($_POST['form-submitted']) ) {
            
            $grupo = isset($_POST['grupo']) ?   $_POST['grupo']  :NULL;
            $descr = isset($_POST['descr'])?   $_POST['descr'] :NULL;

            //comprimento de caracteres nos campos
            $lenghtGrupo =  strlen ($grupo);
            $lenghtDescr =  strlen ($descr);
            
            try{ 

                if ($lenghtGrupo < 3 || $lenghtGrupo > 50) {
                   $this->showError("O campo GRUPO não é válido!", "O GRUPO precisa mínimo de 3 caracteres e no máximo 50 caracteres!"); 
                } elseif ($lenghtDescr < 3 || $lenghtDescr > 100) {
                   $this->showError("O campo SOBRENOME não é válido! ", "O SOBRENOME precisa mínimo de 3 caracteres e no máximo 100 caracteres!"); 
                } else {

                    $this->servicos->createGrupo($grupo, $descr);
                    $this->redirect('index.php?op=lista-grupos');
                    return;
                }
            } catch ( Exception $e ) {
                        $errors = $e->getErrors();
                    }
            
        }
        
        include 'View/form-grupo.php';
    }

    public function mostraGrupo() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Erro interno.');
        }
        $grupo = $this->servicos->getGrupo($id);

        $errors = array();

        if ( isset($_POST['form-submitted']) ) {
            
            $grupo = isset($_POST['grupo']) ?   $_POST['grupo']  :NULL;
            $descr = isset($_POST['descr'])?   $_POST['descr'] :NULL;

            //comprimento de caracteres nos campos
            $lenghtGrupo =  strlen ($grupo);
            $lenghtDescr =  strlen ($descr);
            
            try{ 

                if ($lenghtGrupo < 3 || $lenghtGrupo > 50) {
                   $this->showError("O campo GRUPO não é válido!", "O GRUPO precisa mínimo de 3 caracteres e no máximo 50 caracteres!"); 
                } elseif ($lenghtDescr < 3 || $lenghtDescr > 100) {
                   $this->showError("O campo SOBRENOME não é válido! ", "O SOBRENOME precisa mínimo de 3 caracteres e no máximo 100 caracteres!"); 
                } else {

                    $this->servicos->updateGrupo($id, $grupo, $descr);
                    $this->redirect('index.php?op=lista-grupos');
                    return;
                }
            } catch ( Exception $e ) {
                        $errors = $e->getErrors();
                    }
            
        }
        
        include 'View/mostra_grupo.php';
    }
    
    public function deletaGrupo() {
        $id = isset($_GET['id'])?$_GET['id']:NULL;
        if ( !$id ) {
            throw new Exception('Erro interno.');
        }
        
        $this->servicos->deletaGrupo($id);
        
        $this->redirect('index.php?op=lista-grupos');
    }
    
    
    
    public function showError($title, $message) {
        include 'View/error.php';
    }
    
}
?>
