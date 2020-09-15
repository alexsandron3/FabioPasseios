<?php
session_start();
include_once("conexao.php");
$edit_usuario = "SELECT * FROM usuarios WHERE id='1'";
$resultado_edit_usuario = mysqli_query($conn, $edit_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_edit_usuario);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="sistema.css">
    <title>Editação de clientes</title>
</head>
<body>
        <a href="Clientes.php"> Cadastro</a>
        <a href="Listar.php"> Lista de clientes</a>
        <a href="#">Editar usuario</a>
        <h1 style="text-align:center;">Editar usuário</h1>
        <?php
            if(isset ( $_SESSION['msg'])){
                echo  $_SESSION['msg'];
                unset( $_SESSION['msg']);

            }
        ?>

        <form mehotd="POST" action="proc_edit_usuario.php">
            <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

            <label></label>
                <input type="text" name="nome" placeholder="NOME" value="<?php echo $row_usuario['nome']; ?>"> <br><br>
            
            <label></label>
                <input type="email" name="email" placeholder="EMAIL" value="<?php echo $row_usuario['email']; ?>"> <br><br>
            
            <label></label>
                <input type="text" name="rg" placeholder="RG"     value="<?php echo $row_usuario['rg']; ?>"> <br><br>
            
            <label></label>
                <input type="text" name="cpf" placeholder="CPF" value="<?php echo $row_usuario['cpf']; ?>"> <br><br>
            
            <label></label>
                <input type="text" name="emissor" placeholder="EMISSOR" value="<?php echo $row_usuario['emissor']; ?>" > <br><br>
            
            <label></label>
                <input type="text" name="telefone" placeholder="telefone" value="<?php echo $row_usuario['telefone']; ?>"> <br><br>
           
            <label> </label>
                <input type="date" name="data_nascimento" placeholder="DATA DE NASCIMENTO" value="<?php echo $row_usuario['data_nascimento']; ?>"> <br><br>
            

            <input type="submit" value="Editar">
        </form>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>