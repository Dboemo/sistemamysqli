<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acesso ao sistema</title>
</head>

<body>
    <div id="login">
      
        <div class="container">
            <div id="login-row" class="row justify-content-center align-items-center">
                <div id="login-column" class="col-md-6">
                    <div id="login-box" class="col-md-12">
                        <form id="login-form" class="form"  action="login.php" method="post">
                        <h3 class="text-center text-info">Login</h3>
                        <div class="form-group">
                                <label for="login" class="text-info">Login:</label><br>
                                <input type="text" name="login" id="login" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="senha" class="text-info">Senha:</label><br>
                                <input type="password" name="senha" id="senha" class="form-control">
                            </div>
                            <div class="form-group">
                               
                                <input type="submit" name="Entrar" class="btn btn-info btn-md" value="Entar">
                            </div>    
                        
                        
                    </div>
                </div>
            </div>
        </div>
        <link href="telalogin.css" rel="stylesheet">
        <script src="js/bootstrap.bundle.min.js"></script>

<link href="css/bootstrap.min.css" rel="stylesheet">
        </form>
</body>

</html>