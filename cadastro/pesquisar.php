<?php
session_start();
include_once "conexao.php";
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
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    	<!-- <link rel="stylesheet" type="text/css" href="sistema.css"> -->
		<title>Pesquisar</title>		
	</head>
	<body>
	<div class="container-fluid">
			<div class="dropdown container-fluid">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				MENU </button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item active" href="#">Pesquisar</a>
					<a class="dropdown-item" href="cad_usuario.php">Cadastrar</a>
					<a class="dropdown-item" href="index.php">Lista</a>
					<a class="dropdown-item" href="imprimir.php">Lista de Passeio</a>
					<a class="dropdown-item btn btn-danger" href="../controle_sistema/logout.php">Deslogar</a>
				</div>
			</div>
		
			<h1 style="text-align:center">Pesquisar usuário</h1>
		
			<div class="col-sm-3 my-1">
				<form class="form-group" method="POST" action="">
					<label></label>
						<input class="form-control" type="text" name="nome" placeholder="Digite o nome"> 
						<input class="btn btn-primary" name="SendPesqUser" type="submit" value="Pesquisar Nome"><br><br>

						<input class="form-control" type="text" name="cpf" placeholder="Digite o cpf">
						<input class="btn btn-primary" name="SendPesqCPF" type="submit" value="PesquisarCPF"><br><br>

						<input class="form-control" type="text" name="rg" placeholder="Digite o RG">
						<input class="btn btn-primary" name="SendPesqRG" type="submit" value="PesquisarRG">
						<!-- <input class="form-control" type="text" name="nome" placeholder="Digite o rg"> <br><br> -->
					
				
				
				</form>
			</div>
		
			<table class="table table-hover table-dark">
				<thead>
					<tr class="">
						<th>ID</th>
						<th>Nome</th>
						<th>Email</th>
						<th>RG</th>
						<th>CPF</th>
						<th>EMISSOR</th>
						<th>TELEFONE</th>
						<th>NASCIMENTO</th>
					</tr>
				</thead>
				<tbody>
				<?php
				$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
				$SendPesqCPF = filter_input(INPUT_POST, 'SendPesqCPF', FILTER_SANITIZE_STRING);
				$SendPesqRG = filter_input(INPUT_POST, 'SendPesqRG', FILTER_SANITIZE_STRING);
				if($SendPesqUser){
					$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
					$result_nome = "SELECT * FROM usuarios WHERE nome LIKE '%$nome%' ORDER BY nome";
					$resultado_usuario = mysqli_query($conn, $result_nome);
					while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
						?>
						<tr>
							<th><?php echo $row_usuario ['id'] . "<br>";?></th>
							<td><?php echo $row_usuario ['nome'] . "<br>";  ?></td>
							<td><?php echo $row_usuario ['email'] . "<br>"; ?></td>
							<td><?php echo $row_usuario ['rg'] . "<br>"; ?></td>
							<td><?php echo $row_usuario ['cpf'] . "<br>";  ?></td>
							<td><?php echo $row_usuario ['emissor'] . "<br>"; ?></td>
							<td><?php echo $row_usuario ['telefone'] . "<br>"; ?></td>
							<td><?php echo $row_usuario ['data_nascimento'] ."<br>"; ?></td>
							<td> <?php echo "<a target='_blank' rel='noopener noreferrer' href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a><br>"; ?></td>
							<td> <?php echo "<a href='proc_apagar_usuario.php?id="  . $row_usuario['id'] . "' >Apagar</a><br><hr>";?></td>
							
						</tr>
						
						<?php
						
					}
				};

				if($SendPesqCPF){
					
					$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
					$result_cpf = "SELECT * FROM usuarios WHERE cpf LIKE '%$cpf%' ORDER BY cpf";
					$resultado_usuario = mysqli_query($conn, $result_cpf);
					while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
						?>
						<tr>
							<th><?php echo $row_usuario ['id'] . "<br>";?></th>
							<td><?php echo $row_usuario ['nome'] . "<br>";  ?></td>
							<td><?php echo $row_usuario ['email'] . "<br>"; ?></td>
							<td><?php echo $row_usuario ['rg'] . "<br>"; ?></td>
							<td><?php echo $row_usuario ['cpf'] . "<br>";  ?></td>
							<td><?php echo $row_usuario ['emissor'] . "<br>"; ?></td>
							<td><?php echo $row_usuario ['telefone'] . "<br>"; ?></td>
							<td><?php echo $row_usuario ['data_nascimento'] ."<br>"; ?></td>
							<td> <?php echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a><br>"; ?></td>
							<td> <?php echo "<a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>";?></td>
							
						</tr>
						
						<?php
						
					}


				};

				if($SendPesqRG){
					
					$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
					$result_rg = "SELECT * FROM usuarios WHERE rg LIKE '%$rg%' ORDER BY rg";
					$resultado_usuario = mysqli_query($conn, $result_rg);
					while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
						?>
						<tr>
							<th><?php echo $row_usuario ['id'] . "<br>";?></th>
							<td><?php echo $row_usuario ['nome'] . "<br>";  ?></td>
							<td><?php echo $row_usuario ['email'] . "<br>"; ?></td>
							<td><?php echo $row_usuario ['rg'] . "<br>"; ?></td>
							<td><?php echo $row_usuario ['cpf'] . "<br>";  ?></td>
							<td><?php echo $row_usuario ['emissor'] . "<br>"; ?></td>
							<td><?php echo $row_usuario ['telefone'] . "<br>"; ?></td>
							<td><?php echo $row_usuario ['data_nascimento'] ."<br>"; ?></td>
							<td> <?php echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a><br>"; ?></td>
							<td> <?php echo "<a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>";?></td>
							
						</tr>
						
						<?php
						
					}


				}


				?>

				</tbody>

			</table>
		</div>


		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>