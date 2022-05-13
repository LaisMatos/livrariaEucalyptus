<?php

/********************************************************************************************************************
*Objetivo: Responsável pela manipulação de dados de usuarios.Também fará a conexão entre a View e a Model.
*Autor: lais
*Data: 13/05/22
*Versão: 1.0
*********************************************************************************************************************/



#INSERIR 
function inserirUsuario($dadosUsuario){
    //validação, verificando se a variavel/obj está vazia
    if (!empty($dadosUsuario)) {
        //validação se não estiver vazia a caixa <txtNome> e <txtCelular> e <txtEmail>, o bloco segue rodando. Dados obrigatórios.
        if (!empty($dadosUsuario['txtusuario']) && !empty($dadosUsuario['txtemail']) && !empty($dadosUsuario['senha'])) {
                       
            $arrayDados = array(
                "nome"    => $dadosUsuario['txtusuario'],
                "email"    => $dadosUsuario['txtemail'],
                "senha"    => $dadosUsuario['senha']
            );

            //imput do contato.php. importa está aqui para só chamar o arquivo contato.php depois de validar
            require_once('model/bd/contato.php');
            
            //parte01: chamando a função insertContato() que está no aquivo contato.php e passa os dados do $arrayDados para alimentar o banco de dados --> insertContato($arrayDados);
            //parte02: tratamento de erro caso dado não tenha sido inserido no banco de dados 
            if (insertUser($arrayDados)) {
                return true;
            } 
            else {
                return array('idErro' =>1,'message'=> 'NÃO FOI POSSÍVEL INSERIR OS DADOS NO BANCO DE DADOS');
           }
        //tratamento de erro para campo não preenchido
        }else{
            return array('idErro' =>2,'message' => 'EXISTEM CAMPOS OBRIGATÓRIOS NÃO PREENCHIDOS.'); 
        }
    }
        
}

#LISTAR 
function listarUsuario(){

    //import do arquivo contatp.php para buscar os dados do banco de dados
    require_once('model/bd/contato.php');

    //chama a função selectAllCategoria(), que chamará os dados do banco de dados
    $dados= selectAllUser();

    //retorno de dados
    if (!empty($dados)) {
       return $dados;    
    }else {
        return false;
        
    }    
}

#EXCLUIR 
function excluirUsuario($id){


    //validação do idse for diferente de zero e diferente de vazio e tem que ser um numero 
    if ($id !=0 && !empty($id) && is_numeric($id)) {
        
        //import do arquivo contato
        require_once('model/bd/contato.php');
        
        //chamando fun de model (contato) e validando retorno (true ou false)
        if(deleteUser($id)){
            return true;
        }else{
            return array ( 'idErro'     => 3,
                            'message'   => 'Não pode excluir registro'
            );
        }

    }else{
        return array(   'isErro'    => 4,
                        'message'   => 'Não pode excluir registro - Informar Id'
        );
    }
}


?>