<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao();  // Instancia classe de conexão
    $con->connect(); // Abre conexão com o banco

    $crud = new crud('cliente','localhost','root','','crud'); // Instancia classe com as operações CRUD, passando o nome da tabela como parâmetro
    $codigo = $_GET['codigo']; // Pega o id para exclusão caso exista

    // Método para excluir usando a função da classe CRUD, agora com mysqli
    $crud->excluir("codigo = $codigo"); // Exclui o registro com o id que foi passado

    $con->disconnect(); // Fecha a conexão

    header("Location: Clientes.php"); // Redireciona para a listagem
?>