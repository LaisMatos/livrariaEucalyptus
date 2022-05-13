<?php

/*******************************************************************************************************************************************
*Objetivo: Arquivo de rota. Segementa as ações encaminhabadas pela View (dados de um form, listagem de dados, ação de ou atualizar)
*          Também responsável por encaminhar as solicitações para o controller.
*          Criando arquivo pensando em reutilizar o arquivo para diferentes ações. Ou seja, ter apenas um arquivo de rota
*Autor: lais
*Data: 07/04/22
*Versão: 1.0
********************************************************************************************************************************************/


//Receber dados do formulário
$action = (string)null;
$identificador= (string)null; 



//Validação para verificar se a requisição  é um post de um formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST' || $_SERVER['REQUEST_METHOD']=='GET') {
    /*echo('Requesição de form');*/

    //Recebendo dados via url (get) e qual ação será realizada
    $identificador= strtoupper($_GET['identificador']);
    $action = strtoupper($_GET['action']);     

    //Validação de quem esta solicitando dados para router
    switch ($identificador) {
        case 'CONTATOS':
            //import da controller Contatos
            require_once('controller/controllerContato.php');

            //identificação do tipo de ação que será realizada
           //identificação do tipo de ação que será realizada
           if ($action =='INSERIR') {
                
            // chama função de inserir na controller
            $resposta=inserirContatos($_POST);

            //parte01: função inserirContatos($_POST) do arq controller
            //parte02: validação do tipo de dados que a controller retornou
            if (is_bool($resposta)){ //parte02: se for booleano
                
                //verificar se o retorno foi verdadeiro
                if ($resposta) {
                    //parte01: REDIRECIONANDO PARA PÁGINA INICIAL VIA JS usando <window.location.href='index.php>
                    echo("<script>alert('REGISTRO INSERIDO COM SUCESSO');
                    window.location.href='index.php';</script>");     
                }

              //se retornar um array, então houve um erro de processo de inserção
            } elseif (is_array($resposta)) {
                
                //retorno de msg
                echo("<script>
                    alert('".$resposta['message']."');
                    window.history.back();
                </script>");    
                
            }
        }elseif ($action =='DELETAR') {
                
                //recebendo id do registro que deverá ser exluido, que foi enviado pela url no link da img do excluir através da index
                $idContato = $_GET['id'];

                //chamando fun deleteContato
                $resposta= excluirContatos($idContato);

                //saida de msg
                if (is_bool($resposta)) {
                    
                    if ($resposta) {
                        echo("<script>alert('REGISTRO EXCLUIDO COM SUCESSO');
                        window.location.href='listcontatos.php';</script>");                         
                    }

                }elseif(is_array($resposta)){
                    echo("<script>
                        alert('".$resposta['message']."');
                        window.history.back();
                    </script>");    
                }
            }
        break;

        case 'CATEGORIAS':
            //import da controller Contatos
            require_once('controller/controllerContato.php');

            //identificação do tipo de ação que será realizada
            //identificação do tipo de ação que será realizada
            if ($action =='INSERIR') {
                
            // chama função de inserir na controller
            $resposta=inserirCategoria($_POST);

            //parte01: função inserirContatos($_POST) do arq controller
            //parte02: validação do tipo de dados que a controller retornou
            if (is_bool($resposta)){ //parte02: se for booleano
                
                //verificar se o retorno foi verdadeiro
                if ($resposta) {
                    //parte01: REDIRECIONANDO PARA PÁGINA INICIAL VIA JS usando <window.location.href='index.php>
                    echo("<script>alert('REGISTRO INSERIDO COM SUCESSO');
                    window.location.href='addcategoria.php';</script>");     
                }

                //se retornar um array, então houve um erro de processo de inserção
            } elseif (is_array($resposta)) {
                
                //retorno de msg
                echo("<script>
                    alert('".$resposta['message']."');
                    window.history.back();
                </script>");    
                
            }
        }elseif ($action =='DELETAR') {
                        
                    //recebendo id do registro que deverá ser exluido, que foi enviado pela url no link da img do excluir através da index
                    $idCategoria = $_GET['id'];

                    //chamando fun deleteUsuario
                    $resposta= excluirCategoria($idCategoria);

                    //saida de msg
                    if (is_bool($resposta)) {
                        
                        if ($resposta) {
                            echo("<script>alert('REGISTRO EXCLUIDO COM SUCESSO');
                            window.location.href='addcategoria.php';</script>");                         
                        }

                    }elseif(is_array($resposta)){
                        echo("<script>
                            alert('".$resposta['message']."');
                            window.history.back();
                        </script>");    
                    }
                }
            break;

        case 'USUARIO':
            //import da controller Contatos
            require_once('controller/controllerUsuario.php');

            //identificação do tipo de ação que será realizada
            //identificação do tipo de ação que será realizada
            if ($action =='INSERIR') {
                
            // chama função de inserir na controller
            $resposta=inserirUsuario($_POST);

            //parte01: função inserirContatos($_POST) do arq controller
            //parte02: validação do tipo de dados que a controller retornou
            if (is_bool($resposta)){ //parte02: se for booleano
                
                //verificar se o retorno foi verdadeiro
                if ($resposta) {
                    //parte01: REDIRECIONANDO PARA PÁGINA INICIAL VIA JS usando <window.location.href='index.php>
                    echo("<script>alert('REGISTRO INSERIDO COM SUCESSO');
                    window.location.href='admUser.php';</script>");     
                }

                //se retornar um array, então houve um erro de processo de inserção
            } elseif (is_array($resposta)) {
                
                //retorno de msg
                echo("<script>
                    alert('".$resposta['message']."');
                    window.history.back();
                </script>");    
                
            }
        }elseif ($action =='DELETAR') {
                
                //recebendo id do registro que deverá ser exluido, que foi enviado pela url no link da img do excluir através da index
                $idUsuario = $_GET['idusuario'];

                //chamando fun deleteUsuario
                $resposta= excluirUsuario($idUsuario);

                //saida de msg
                if (is_bool($resposta)) {
                    
                    if ($resposta) {
                        echo("<script>alert('REGISTRO EXCLUIDO COM SUCESSO');
                        window.location.href='admUser.php';</script>");                         
                    }

                }elseif(is_array($resposta)){
                    echo("<script>
                        alert('".$resposta['message']."');
                        window.history.back();
                    </script>");    
                }
            }
        break;


    }
        
            
}



?>