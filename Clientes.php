<?php
    require_once 'config/conexao.class.php';
    require_once 'config/crud.class.php';

    $con = new conexao(); // Instancia a classe de conex�o
    $con->connect(); // Abre a conex�o com o banco
?>
<!DOCTYPE html>
<html>
    <head>
          <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
          
        <title>Lista de Clientes</title>
    </head>
    <body>
<!-- Nav tabs -->
<ul
    class="nav nav-tabs"
    id="navId"
    role="tablist"
>
<li class="nav-item dropdown">
        <a
            class="nav-link dropdown-toggle"
            data-bs-toggle="dropdown"
            href="#"
            role="button"
            aria-haspopup="true"
            aria-expanded="false"
            >Funções</a
        >
        <div class="dropdown-menu">
            <a class="dropdown-item" href="formulariocli.php">Cadastrar novo cliente</a>
            <a class="dropdown-item" href="principal.php">Sair</a>
         
        </div>
    </li>





</ul>



<!-- (Optional) - Place this js code after initializing bootstrap.min.js or bootstrap.bundle.min.js -->
        <div
            class="table-responsive"
        >
            <table
                class="table table-striped table-hover table-borderless table-primary align-middle"
            >
                <thead class="table-light">

                    <tr>
                    <th>Codigo</th>
                    <th>Nome</th>
                    <th>Senha</th>
                    <th>Acesso</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                <?php
                    // Consulta usando mysqli
                    $consulta = $con->getConnection()->query("SELECT * FROM cliente");

                    if ($consulta) {
                        while ($campo = $consulta->fetch_assoc()) { // Utilizando fetch_assoc() para buscar os resultados
                ?>
                            <tr>
                                <td>
                                    <?php echo $campo['codigo']; // Mostrando o campo codigo da tabela ?>
                                </td>
                                <td>
                                    <?php echo $campo['nome']; // Mostrando o campo nome da tabela ?>
                                </td>
                                <td>
                                    <?php echo $campo['senha']; // Mostrando o campo nome da tabela ?>
                                </td>
                                <td>
                                    <?php echo $campo['tipo']; // Mostrando o campo nome da tabela ?>
                                </td>
                                <td>
                                    <a href="formulariocli.php?codigo=<?php echo $campo['codigo']; // Pegando o campo ID para a edi��o ?>">
                                        Editar
                                    </a>
                                </td>
                                <td>
                                    <a href="excluircli.php?codigo=<?php echo $campo['codigo'];  // Pegando o campo ID para a exclus�o ?>">
                                        Excluir
                                    </a>
                                </td>
                            </tr>
                <?php
                        }
                    } else {
                        echo 'Erro na consulta: ' . $con->getConnection()->error; // Caso haja erro na consulta
                    }
                ?>
                </tbody>
                <tfoot>
                    
                </tfoot>
            </table>
        </div>
        

    </body>
</html>
<script src="js/bootstrap.bundle.min.js"></script>

<link href="css/bootstrap.min.css" rel="stylesheet">
<?php
    $con->disconnect(); // Fecha a conex�o com o banco
?>