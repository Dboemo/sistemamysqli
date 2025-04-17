<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <ul
    class="nav nav-tabs"
    id="navId"
    role="tablist"
   >
    <li class="nav-item">
        <a
            href="principal.php"
            class="nav-link active"
            data-bs-toggle="tab"
            aria-current="page"
            >Principal</a
        >
    </li>
    <li class="nav-item dropdown">
        <a
            class="nav-link dropdown-toggle"
            data-bs-toggle="dropdown"
            href="#"
            role="button"
            aria-haspopup="true"
            aria-expanded="false"
            >Cadastros</a
        >
        <div class="dropdown-menu">
            <a class="dropdown-item" href="Produtos.php">Produtos</a>
            <a class="dropdown-item" href="Clientes.php">Clientes</a>
         
        </div>
    </li>

    </li>
   </ul>
   
   <!-- Tab panes -->
   <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="tab1Id" role="tabpanel">
        
    </div>
    <div class="tab-pane fade" id="tab2Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab3Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab4Id" role="tabpanel"></div>
    <div class="tab-pane fade" id="tab5Id" role="tabpanel"></div>
   </div>
   
<script src="js/bootstrap.bundle.min.js"></script>

<link href="css/bootstrap.min.css" rel="stylesheet">
    
</body>
</html>