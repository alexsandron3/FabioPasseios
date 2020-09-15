<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Olá, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Bem vindo ao sistema.</h1>
    </div>
    <p>
        <a href="../index.php" class="btn btn-primary">Lista de Clientes </a>
        <a href="../cad_usuario.php" class="btn btn-primary">Cadastrar Clientes </a>
        <a href="../pesquisar.php" class="btn btn-primary">Pesquisar Clientes </a>
        <a href="../user_data_print.php" class="btn btn-primary">Imprimir lista de Clientes </a>
        <a href="../imprimir.php" class="btn btn-primary">Editar lista de Clientes </a>
        <a href="reset-password.php" class="btn btn-warning">Trocar Senha </a>
        <a href="logout.php" class="btn btn-danger">Deslogar</a>
        
    </p>
</body>
</html>