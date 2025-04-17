<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao(); // Instancia a classe de conex�o
    $con->connect(); // Abre a conex�o com o banco

    $nome=$_POST['login'];
    $senha=$_POST['senha'];

    $consulta = $con->getConnection()->query(
        "SELECT * FROM cliente where nome='".$nome."' and senha ='".$senha."'");
    $campo = $consulta->fetch_assoc();
    if ($campo!=null){
        header("Location: principal.php");
    }else{
        header("Location: index.php");

    }
    

?>