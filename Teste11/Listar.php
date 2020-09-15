<?php
session_start();
include_once("conexao.php");

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="sistema.css">
    <title>Lista de clientes</title>
</head>
<body>
        <a href="Clientes.php"> Cadastro</a>
        <a href="#"> Lista de clientes</a>
        <a href="edit_usuario.php">Editar usuario</a>
        <h1 style="text-align:center;">Listar usuários</h1>
        <?php
            if(isset ( $_SESSION['msg'])){
                echo  $_SESSION['msg'];
                unset( $_SESSION['msg']);

            }
            //Recebendo o número da página
            $pagina_atual = filter_input(INPUT_GET, 'pagina', FILTER_SANITIZE_NUMBER_INT);
            $pagina = (!empty($pagina_atual)) ? $pagina_atual : 1;

            //Setando a quantidade de itens por página
            $qnt_result_pg = 3;

            //Calcular o inicio visualização 
            $inicio = ($qnt_result_pg * $pagina) - $qnt_result_pg;

            $lista_usuarios = "SELECT * FROM usuarios LIMIT $inicio, $qnt_result_pg ";
            $resultado_usuarios = mysqli_query  ($conn, $lista_usuarios);
            while ($row_usuarios = mysqli_fetch_assoc($resultado_usuarios)){
                echo "ID: " . $row_usuarios ['id'] . "<br>";
                echo "Nome: " . $row_usuarios ['nome'] . "<br>";
                echo "Email: " . $row_usuarios ['email'] . "<br>";
                echo "RG: " . $row_usuarios ['rg'] . "<br>";
                echo "CPF: " . $row_usuarios ['cpf'] . "<br>";
                echo "Emissor: " . $row_usuarios ['emissor'] . "<br>";
                echo "Telefone: " . $row_usuarios ['telefone'] . "<br>";
                echo "Nascimento: " . $row_usuarios ['data_nascimento'] . "<br><hr>";
                echo "<a href='edit_usuario.php?id=" . $row_usuarios['id'] . "'>Editar</a><br><hr>";

            }

            //Somar quantidade de usuarios
            $result_pg = "SELECT COUNT(id) AS num_result FROM usuarios";
		    $resultado_pg = mysqli_query($conn, $result_pg);
		    $row_pg = mysqli_fetch_assoc($resultado_pg);
            //echo $row_pg['num_result'];
            $quantidade_pg = ceil($row_pg['num_result']/ $qnt_result_pg);
            
            //limitar quantidade de linkss
            $max_links = 2;
            echo "<a href='listar.php?pagina=1'>Primeira</a>";
            for ($pag_ant = $pagina - $max_links; $pag_ant <= $pagina - 1; $pag_ant++){
                if($pag_ant >=1) {
                    echo "<a href='listar.php?pagina=$pag_ant'>$pag_ant</a> ";  
                }
            }
            echo "$pagina";

            for($pag_dep = $pagina + 1; $pag_dep <= $pagina + $max_links; $pag_dep++){
                if($pag_dep <= $quantidade_pg){
                    echo "<a href='listar.php?pagina=$pag_dep'>$pag_dep</a> ";    
                }
             }
            echo "<a href='listar.php?pagina=$quantidade_pg'>Última</a> ";
            
        ?>

        </form>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>