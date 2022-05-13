<?php

/*******************************************************************************************************************************************
*Objetivo: Arquivo que estabelce conexão com banco de dados
*Autor: lais
*Data: 07/03/22
*Versão: 1.0
********************************************************************************************************************************************/



// const para estabelecer a conexão com o BD 
const SERVER = 'localhost'; // local do banco
const USER = 'root'; //usuário
const PASSWORD ='bcd127';  //senha
const DATABASE = 'dblivraria'; //nome do banco


//criar variavel $resultado que recebe a função conexaoMysql() para executar a função e exibir via var_dump o código
$resultado = conexaoMysql();

// fun para abertura da conexão com bd
function conexaoMysql(){
    
    //criação de array para armazenar dados do banco
    $conexao=array();
    
    //se conexão for stabelecida com o BD, retornará um array de dados sobre a conexão
    $conexao=mysqli_connect(SERVER, USER, PASSWORD, DATABASE);

    //teste lógico para validar se a conexão foi realizada com sucesso
    if ($conexao) {
        return $conexao;
    }else {
        return false;
    }
 
}

//fechar conexão com bd
function fecharConexaoMysql($conexao){
    mysqli_close($conexao);
}






?>