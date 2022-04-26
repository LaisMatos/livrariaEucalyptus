
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="css/styleTbl.css">
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
    
    <main>

          
        <section id="conteudo">
            <div id="consultaDeDados">
                <table id="tblConsulta" >
                    <tr>
                        <td id="tblTitulo" colspan="6">
                            <h1>Listar Contatos</h1>
                        </td>
                    </tr>
                    <tr id="tblLinhas">
                        <td class="tblColunas destaque"> Nome </td>
                        <td class="tblColunas destaque"> Email</td>
                        <td class="tblColunas destaque"> Assunto</td>
                        <td class="tblColunas destaque"> Produto</td>
                    </tr>
                    
                
                    <tr id="tblLinhas">


                    <?php
                    // conexão com o arq controllerContatos
                    require_once('controller/controllerContato.php');
                    //chamando a fun listarcontatos da controller
                    $listContato = listarContatos(); 
                    //estrutura de repetição para retornar os dados do array printar na tela
                    foreach ($listContato as $item) { //for para exibir listas na tela
                    ?>
                        <td class="tblColunas registros"><?=$item['nome']?></td>
                        <td class="tblColunas registros"><?=$item['email']?></td>
                        <td class="tblColunas registros"><?=$item['assunto']?></td>
                        <td class="tblColunas registros"><?=$item['produto']?></td>
                                    
                        <td class="tblColunas registros">
                            <img src="img/edit.png" alt="Editar" title="Editar" class="editar">

                            <!--icone excluir-->
                            <a onclick="return confirm('Deseja excluir este item?');" href="router.php?identificador=contatos&action=deletar&id=<?=$item['id']?>"> <!--manipulando id c/ php aqui-->
                                <img src="img/trash.png" alt="Excluir" title="Excluir" class="excluir">    
                            </a>  

                            <img src="img/search.png" alt="Visualizar" title="Visualizar" class="pesquisar">
                        </td>

                    </tr>
            <?php
                //fechamento do foreach
                }
            ?>
                </table>
            </div>
        </section>

    </main>


    <footer>
       
    </footer>
</body>
</html>