<?php
session_start(); 
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario); 
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: ../controle_sistema/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
		<meta charset="utf-8">
        <meta http-equiv="refresh" content="900;url=../controle_sistema/logout.php"/>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    	<link rel="stylesheet" type="text/css" href="sistema.css">
		<title> GERENCIAR LISTA DE PASSEIO</title>		
    </head>
    
    <body>
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            MENU </button>
            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="pesquisar.php">Pesquisar</a>
                <a class="dropdown-item" href="cad_usuario.php">Cadastrar</a>
                <a class="dropdown-item" href="index.php">Lista</a>
                <a class="dropdown-item" href="#">Lista de Passeio</a>
                <a class="dropdown-item btn btn-danger" href="../controle_sistema/logout.php">Deslogar</a>
            </div>
        </div>
        <?php
            if(isset($_SESSION['msg'])){
                echo $_SESSION['msg'];
                unset($_SESSION['msg']);
            }
        ?>
        
        <form method="POST" action="imprimir.php">
            <input class="btn btn-primary" name="SendPesqUser" type="submit" value="Atualizar usuários Selecionados">
        </form></br></br>
        


	
        <table class="table table-hover table-dark">
            <thead>
                <tr class="">
                    <th>ID</th>
                    <th>Nome</th>
                    <th>RG</th>
                    <th>CPF</th>
                    <th>EMISSOR</th>
                    <th>NASCIMENTO</th>
                </tr>
				</thead>
            <?php
              
				$SendPesqUser = 1;
				if($SendPesqUser){
					$result_nome = "SELECT * FROM usuarios WHERE imprimir = 1  ORDER BY nome";
					$resultado_usuario = mysqli_query($conn, $result_nome);
					while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
						?>
						<tr>
                            <div id="printTable">
                                <th><?php echo $row_usuario ['id'] . "<br>";?></th>
                                <td><?php echo $row_usuario ['nome'] . "<br>";  ?></td>
                                <td><?php echo $row_usuario ['rg'] . "<br>"; ?></td>
                                <td><?php echo $row_usuario ['cpf'] . "<br>";  ?></td>
                                <td><?php echo $row_usuario ['emissor'] . "<br>"; ?></td>
                            </div>

							<td><?php echo $row_usuario ['data_nascimento'] ."<br>"; ?></td>
							<td> <?php echo "<a target='_blank' rel='noopener noreferrer' href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a><br>"; ?></td>
							<td> <?php echo "<a href='proc_limp_editados.php?id="  . $row_usuario['id'] . "' >Remover</a><br><hr>";?></td>
						</tr>
						
						<?php
						
					}
                };
                
            ?>

        </table>
        <div class="text-center">
            <a target='_blank' rel='noopener noreferrer' href="user_data_print.php" class="btn btn-primary">Imprimir</a>
            <button onclick="Export()" class="btn btn-primary">Exportar para arquivo EXCEL</button>
        </div> 
        <script>
        function Export()
        {
            var conf = confirm("Exportar para EXCEL?");
            if(conf == true)
            {
                window.open("export.php", '_blank');
            }
        }
    </script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>





</html>