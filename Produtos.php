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
          
        <title>Lista de Produtos</title>
    </head>
    <body>

        <a href="formulario.php">Novo</a>

        <div
            class="table-responsive"
        >
            <table
                class="table table-striped table-hover table-borderless table-primary align-middle"
            >
                <thead class="table-light">

                    <tr>
                    <th>Nome</th>
                    <th>Desc.</th>
                    <th>Modificadores</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider">

                <?php
                    // Consulta usando mysqli
                    $consulta = $con->getConnection()->query("SELECT * FROM produto");

                    if ($consulta) {
                        while ($campo = $consulta->fetch_assoc()) { // Utilizando fetch_assoc() para buscar os resultados
                ?>
                            <tr>
                                <td>
                                    <?php echo $campo['nome']; // Mostrando o campo NOME da tabela ?>
                                </td>
                                <td>
                                    <?php echo $campo['descricao']; // Mostrando o campo DESCRICAO da tabela ?>
                                </td>
                                <td>
                                    <a href="formulario.php?id=<?php echo $campo['id']; // Pegando o campo ID para a edi��o ?>">
                                        Editar
                                    </a>
                                </td>
                                <td>
                                    <a href="excluir.php?id=<?php echo $campo['id'];  // Pegando o campo ID para a exclus�o ?>">
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