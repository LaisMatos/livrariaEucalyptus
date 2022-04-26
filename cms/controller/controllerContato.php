<?php

/********************************************************************************************************************
*Objetivo: Responsável pela manipulação de dados de contatos.Também fará a conexão entre a View e a Model.
*Autor: lais
*Data: 07/04/22
*Versão: 1.0
*********************************************************************************************************************/



//fun recebe dados da View e encaminha para a model
function inserirCategoria($dadosCategoria){
    //validação, verificando se a variavel/obj está vazia
    if (!empty($dadosCategoria)) {
        //validação se não estiver vazia a caixa <txtNome> e <txtCelular> e <txtEmail>, o bloco segue rodando. Dados obrigatórios.
        if (!empty($dadosCategoria['txtcategoria'])) {
            
            /*
            Criação do array de dados que será encaminhado a model para inserir no banco de dados,
            é importante criar este array conforme as necessidades de manipulação do banco de dados.
            OBS: CRIAR CAHVES-VALOR DO ARRAY CONFORME OS NOMES DOS ATRIBUTOS DO BANCO DE DADOS

            se não criar esse array todos os tipos de dado recebidos via post, até o valor do salvar botão, chegará no no bd
            
            */
            $arrayDados = array(
                "categoria"    => $dadosCategoria['txtcategoria']   
            );

            //imput do contato.php. importa está aqui para só chamar o arquivo contato.php depois de validar
            require_once('model/bd/contato.php');
            
            //parte01: chamando a função insertContato() que está no aquivo contato.php e passa os dados do $arrayDados para alimentar o banco de dados --> insertContato($arrayDados);
            //parte02: tratamento de erro caso dado não tenha sido inserido no banco de dados 
            if (insertCategoria($arrayDados)) {
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

//fun solicita dados de model e encaminha a lista de contatos para a View
function listarCategoria(){

    //import do arquivo contatp.php para buscar os dados do banco de dados
    require_once('model/bd/contato.php');

    //chama a função selectAllContatos(), que chamará os dados do banco de dados
    $dados= selectAllCategoria();

    //retorno de dados
    if (!empty($dados)) {
       return $dados;    
    }else {
        return false;
        
    }

    
}

//fun para realizar eclusão de dados de contatos
function excluirCategoria($id){

    //validação do idse for diferente de zero e diferente de vazio e tem que ser um numero 
    if ($id !=0 && !empty($id) && is_numeric($id)) {
        
        //import do arquivo contato
        require_once('model/bd/contato.php');
        
        //chamando fun de model (contato) e validando retorno (true ou false)
        if(deleteCategoria($id)){
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

//fun solicita dados de model e encaminha a lista de contatos para a View
function listarContatos(){

    //import do arquivo contatp.php para buscar os dados do banco de dados
    require_once('model/bd/contato.php');

    //chama a função selectAllContatos(), que chamará os dados do banco de dados
    $dados= selectAllContato();

    //retorno de dados
    if (!empty($dados)) {
       return $dados;    
    }else {
        return false;
        
    }

    
}

//fun para realizar eclusão de dados de contatos
function excluirContatos($id){

    //validação do idse for diferente de zero e diferente de vazio e tem que ser um numero 
    if ($id !=0 && !empty($id) && is_numeric($id)) {
        
        //import do arquivo contato
        require_once('model/bd/contato.php');
        
        //chamando fun de model e validando retorno (true ou false)
        if(deleteContato($id)){
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