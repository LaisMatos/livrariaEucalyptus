<?php

/*******************************************************************************************************************************************
*Objetivo: Arquivo que lista contatos para o banco de dados
*Autor: lais
*Data: 07/03/22
*Versão: 1.0
********************************************************************************************************************************************/


//import do arquivo que estabelece a conexão com o banco de dados
require_once('conexaoMysql.php');


#INSERIR CATEGORIAS
function insertCategoria($dadosCategoria){
    
    //abetura de conexão com o banco de dados
    $conexao= conexaoMysql();

    //Script para enviar ao banco de dados
    $sql="insert into tblcategoria
            (categoria 
            )
        values
            ('".$dadosCategoria['categoria']."' 
            );"
            ;
    

   //parte1: execução do script no banco de dados --> mysqli_query($conexao,$sql) //mysqli_query retorna um booleno
   //parte2: verificação se o script sql esta correto
    if (mysqli_query($conexao,$sql)){  
        //verificação se uma linha foi acrescentada no banco
        if (mysqli_affected_rows($conexao)) { //verifica se teve alguma linha no baco afetada <mysqli_affected_rows>
            
            fecharConexaoMysql($conexao);
            return true;
        }else {
            
            fecharConexaoMysql($conexao);
            return false;
        }
    }else{
            fecharConexaoMysql($conexao);
            return false;
    } 

}
#SELECIONAR TODAS AS CATEGORIAS
function selectAllCategoria(){
    //estabelecendo conecxão com a função conexaoMysql();
    $conexao= conexaoMysql();
    
    //criando script para listar todos os dados do banco de dados 
    $sql="select*from tblcategoria order by idcategoria desc";
    $result = mysqli_query($conexao,$sql);

    //valida se o banco de dados retornou registros
    if ($result) {
        
        $cont=0;

        //armazenando array convertido (convertido usando a estrutura fetch)
        while ($rsDados = mysqli_fetch_assoc($result)) {
            
            //Extraindo os dados da estrutura <fecth_assoc> //criar um array com os dados do banco de dados
            //array baseado em indice e com chaves
            $arrayDados[$cont]=array(

                "id"        =>$rsDados['idcategoria'],
                "categoria"      =>$rsDados['categoria']
            );
            $cont++;
        }
      

        //solicita o fechamento da conexão como bd por motivos de segurança    
        fecharConexaoMysql($conexao);
        //retornando os dados do array
        return $arrayDados;
    }
}
#DELETAR CATEGORIA
function deleteCategoria($id){
    //declaração de variavel para utilizar no return da fun
     $statusResposta=(boolean)false;
     
     //abrir conexão com o banco
     $conexao = conexaoMysql();
 
     //montar script para deletar resgistro
     $sql= "delete from tblcategoria where idcategoria=".$id;
  
     //validação com if se o script está correto e executa no bd
     if(mysqli_query($conexao,$sql)){
         
         //valida se o bd teve sucesso da execução do script retornando um boolean
         if(mysqli_affected_rows($conexao)){
             $statusResposta=true;
         }
     }
     //fecha conexão com bd
     fecharconexaoMysql($conexao);
     return $statusResposta;
 } 

#SELECIONAR TODOS CONTATOS
function selectAllContato(){
    //estabelecendo conecxão com a função conexaoMysql();
    $conexao= conexaoMysql();
    
    //criando script para listar todos os dados do banco de dados 
    $sql="select*from tblcontatos order by idcontato desc";
    $result = mysqli_query($conexao,$sql);

    //valida se o banco de dados retornou registros
    if ($result) {
        
        $cont=0;

        //armazenando array convertido (convertido usando a estrutura fetch)
        while ($rsDados = mysqli_fetch_assoc($result)) {
            
            //Extraindo os dados da estrutura <fecth_assoc> //criar um array com os dados do banco de dados
            //array baseado em indice e com chaves
            $arrayDados[$cont]=array(

                "id"        =>$rsDados['idcontato'],
                "nome"      =>$rsDados['nome'],
                "email"     =>$rsDados['email'],
                "assunto"   =>$rsDados['assunto'],
                "produto"   =>$rsDados['produto'],
                "descricao" =>$rsDados['descricao']
            );
            $cont++;
        }
      

        //solicita o fechamento da conexão como bd por motivos de segurança    
        fecharConexaoMysql($conexao);
        //retornando os dados do array
        return $arrayDados;
    }
}
#DELETE CONTATO
function deleteContato($id){

    //declaração de variavel para utilizar no return da fun
     $statusResposta=(boolean)false;
     
     //abrir conexão com o banco
     $conexao = conexaoMysql();
 
     //montar script para deletar resgistro
     $sql= "delete from tblcontatos where idcontato=".$id;
  
     //validação com if se o script está correto e executa no bd
     if(mysqli_query($conexao,$sql)){
         
         //valida se o bd teve sucesso da execução do script retornando um boolean
         if(mysqli_affected_rows($conexao)){
             $statusResposta=true;
         }
     }
     //fecha conexão com bd
     fecharconexaoMysql($conexao);
     return $statusResposta;
 }
    
   
/*___________________________________________________________________________*/
#INSERIR USUARIO
function insertUser($dadosUsuario){ 
    
    //abetura de conexão com o banco de dados
    $conexao= conexaoMysql();

    //Script para enviar ao banco de dados
    $sql="insert into tblusuario
            (   nome,
                email,
                senha
            )
        values
            (   '".$dadosUsuario['nome']."',
                '".$dadosUsuario['email']."',
                '".$dadosUsuario['senha']."' 
            );"
            ;
  
   //parte1: execução do script no banco de dados --> mysqli_query($conexao,$sql) //mysqli_query retorna um booleno
   //parte2: verificação se o script sql esta correto
    if (mysqli_query($conexao,$sql)){  
        //verificação se uma linha foi acrescentada no banco
        if (mysqli_affected_rows($conexao)) { //verifica se teve alguma linha no baco afetada <mysqli_affected_rows>
            
            fecharConexaoMysql($conexao);
            return true;
        }else {
            
            fecharConexaoMysql($conexao);
            return false;
        }
    }else{
            fecharConexaoMysql($conexao);
            return false;
    } 

}
#SELECIONAR TODOS USUARIOS
function selectAllUser(){
    //estabelecendo conecxão com a função conexaoMysql();
    $conexao= conexaoMysql();
    
    //criando script para listar todos os dados do banco de dados 
    $sql="select * from tblusuario order by idusuario desc";
    $result = mysqli_query($conexao,$sql);

    //valida se o banco de dados retornou registros
    if ($result) {
        
        $cont=0;

        //armazenando array convertido (convertido usando a estrutura fetch)
        while ($rsDados = mysqli_fetch_assoc($result)) {
            
            //Extraindo os dados da estrutura <fecth_assoc> //criar um array com os dados do banco de dados
            //array baseado em indice e com chaves
            $arrayDados[$cont]=array(

                "idusuario"      =>$rsDados['idusuario'],
                "nome"           =>$rsDados['nome'],
                "email"          =>$rsDados['email'],
                "senha"          =>$rsDados['senha']
            );
            $cont++;
        }
    
        //solicita o fechamento da conexão como bd por motivos de segurança    
        fecharConexaoMysql($conexao);
        //retornando os dados do array
       if(isset($arrayDados)){
        return $arrayDados;
       } else{
           return false;
       }
    }
}

#DELETAR USUARIO
function deleteUser($id){
    //declaração de variavel para utilizar no return da fun
     $statusResposta=(boolean)false;
     
     //abrir conexão com o banco
     $conexao = conexaoMysql();
 
     //montar script para deletar resgistro
     $sql= "delete from tblusuario where idusuario=".$id;
  
     //validação com if se o script está correto e executa no bd
     if(mysqli_query($conexao,$sql)){
         
         //valida se o bd teve sucesso da execução do script retornando um boolean
         if(mysqli_affected_rows($conexao)){
             $statusResposta=true;
         }
     }
     //fecha conexão com bd
     fecharconexaoMysql($conexao);
     return $statusResposta;
 } 












?>