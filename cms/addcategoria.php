
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
     <!--<link rel="stylesheet" type="text/css" href="css/styleTbl.css"> -->
    <link rel="stylesheet" type="text/css" href="css/styleAddCategoria.css">
    <title>Acesso de ADM</title>
</head>
<body>
    <header>
        <div id="titulo">
            <h1>CMS</h1>         
        </div>
        <div id="subTitulo">
            <h2>Gerenciamento de Conteúdo do Site</h2>
        </div>  
        <div>
            <label id="logo">Livraria Eucalyptus</label>            
        </div>  
    </header>
    
    <section>
        <nav>
            <a href="#"><img src="img/addLivro-50.png" alt="Adicionar Produto">Add.Produto</a>
            <a href="#"><img src="img/addPasta-50.png" alt="Adicionar Categoria">Add.Categoria</a>
            <a href="#"><img src="img/mensagem-50.png" alt="Contatos">Contatos</a>
            <a href="#"><img src="img/usuário-50.png" alt="Usuário">Usuário</a> 
            <a href="#" id="logout"><img src="img/sair-50.png" alt="Logout">Sair</a>       
        </nav>
        
    </section>
    
    <main id="conteudo">

        <section id="addContato">
                <h3>Inserir Categoria</h3>
                <div id="form">
                    <form name="insertCategoria" method="Post" action="router.php?identificador=categorias&action=inserir">
                        <span>Categoria</span> 
                        <input type="text" name="txtcategoria" size="60" maxlength="30">        
                        <input type="submit" id="botao" value="Inserir">               
                    </form>
                </div>
                
        </section>

        
            <section id="conteudo">

                <div id="consultaDeDados">
                    <table id="tblConsulta" >
                        <tr>
                            <td id="tblTitulo" colspan="6">
                                <h1>Listar Categoria</h1>
                            </td>
                        </tr>
                        <tr id="tblLinhas">
                            <td class="tblColunas destaque"> Categoria </td>                      
                        </tr>
                
                    
                        <tr id="tblLinhas">

                            <?php
                            // conexão com o arq controllerContatos
                            require_once('controller/controllerContato.php');
                            //chamando fun listarcontatos da controller
                            $listCategoria = listarCategoria(); 
                            //estrutura de repetição para retornar os dados do array printar na tela
                            foreach ($listCategoria as $item) { //for para exibir listas na tela
                            ?>

                                <td class="tblColunas registros"><?=$item['categoria']?></td>
                                                            
                                <td class="tblColunas registros">
                                    <img src="img/edit.png" alt="Editar" title="Editar" class="editar"> <!--editar-->
                                       
                                <a onclick="return confirm('Deseja excluir este item?');" href="router.php?identificador=categorias&action=deletar&id=<?=$item['id']?>"> 
                                    <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">    
                                </a> 

                                    <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                                </td>

                            <?php
                            }                    
                            ?>
                        </tr>
                    </table>
                </div>
            </section>
        
    </main>


    <footer>
       
    </footer>
</body>
</html>