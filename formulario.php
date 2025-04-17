<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao(); // Instancia classe de conexão
    $con->connect(); // Abre conexão com o banco

    @$getId = $_GET['id'];  // Pega id para edição caso exista

    if (@$getId) { // Se existir, recupera os dados e traz os campos preenchidos
        $consulta = $con->query("SELECT * FROM produto WHERE id = $getId");
        $campo = $consulta->fetch_assoc();
    }
   
    if (isset ($_POST['cadastrar'])) {  // Caso não seja passado o id via GET, realiza o cadastro
        $nome = $_POST['nome'];  // Pega o elemento com o pelo NAME
        $descricao = $_POST['descricao']; // Pega o elemento com o pelo NAME
        $crud = new crud('produto','localhost','root','','crud');  // Instancia classe com as operações CRUD, passando o nome da tabela como parâmetro
        $crud->inserir("nome, descricao", "'$nome', '$descricao'"); // Utiliza a função INSERIR da classe CRUD
        header("Location: Produtos.php"); // Redireciona para a listagem
    }

    if (isset ($_POST['editar'])) { // Caso seja passado o id via GET, realiza a edição
        $nome = $_POST['nome']; // Pega o elemento com o pelo NAME
        $descricao = $_POST['descricao']; // Pega o elemento com o pelo NAME
        $crud = new crud('produto','localhost','root','','crud'); // Instancia classe com as operações CRUD, passando o nome da tabela como parâmetro
        $crud->atualizar("nome='$nome', descricao='$descricao'", "id='$getId'"); // Utiliza a função ATUALIZAR da classe CRUD
        header("Location: Produtos.php"); // Redireciona para a listagem
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Cadastro de Produto</title>
    </head>
    <body>
        <form action="" method="post"> <!-- O formulário carrega a si mesmo com o action vazio -->

            <label>Nome:</label>
            <input type="text" name="nome" value="<?php echo @$campo['nome']; // Trazendo campo preenchido caso esteja no modo de edição ?>" />
            <br />
            <br />
            <label>Descrição:</label>
            <input type="text" name="descricao" value="<?php echo @$campo['descricao']; // Trazendo campo preenchido caso esteja no modo de edição ?>" />
            <br />
            <br />
            <?php
                if (@!$campo['id']) { // Se não passar o id via GET, não está editando, mostra o botão de cadastro
            ?>
                <input type="submit" name="cadastrar" value="Cadastrar" />
            <?php } else { // Se passar o id via GET, está editando, mostra o botão de edição ?>
                <input type="submit" name="editar" value="Editar" />   
            <?php } ?>
        </form>
    </body>
</html>
<script src="js/bootstrap.bundle.min.js"></script>

<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
    $con->disconnect(); // Fecha conexão com o banco
?>