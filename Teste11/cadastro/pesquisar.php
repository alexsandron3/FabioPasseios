<?php

include_once "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    	<link rel="stylesheet" type="text/css" href="sistema.css">
		<title>Pesquisar</title>		
	</head>
	<body>
		<a href="cad_usuario.php">Cadastrar</a><br>
		<a href="index.php">Lista</a><br>
		<h1 style="text-align:center">Pesquisar usuário</h1>
		<form method="POST" action="">
            <label></label>
                <input type="text" name="nome" placeholder="Digite o nome"> <br><br>
            <input name="SendPesqUser" type="submit" value="Pesquisar">
        
        
        </form>
		<table>
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Email</th>
					<th>RG</th>
				</tr>
			</thead>
			<tbody>
			<?php
			$SendPesqUser = filter_input(INPUT_POST, 'SendPesqUser', FILTER_SANITIZE_STRING);
			if($SendPesqUser){
				$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
				$result_usuario = "SELECT * FROM usuarios WHERE nome LIKE '%$nome%'";
				$resultado_usuario = mysqli_query($conn, $result_usuario);
				while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
					?>
					<tr>
						<th><?php echo "ID: " . $row_usuario ['id'] . "<br>"; ?></th>
						<td>Mark</td>
						<td>Otto</td>
						<td>@mdo</td>
					</tr>
					<?php
					
					echo "Nome: " . $row_usuario ['nome'] . "<br>";
					echo "Email: " . $row_usuario ['email'] . "<br>";
					echo "RG: " . $row_usuario ['rg'] . "<br>";
					echo "CPF: " . $row_usuario ['cpf'] . "<br>";
					echo "Emissor: " . $row_usuario ['emissor'] . "<br>";
					echo "Telefone: " . $row_usuario ['telefone'] . "<br>";
					echo "Nascimento: " . $row_usuario ['data_nascimento'] ."<br>";
					echo "<a href='edit_usuario.php?id=" . $row_usuario['id'] . "'>Editar</a><br>";
					echo "<a href='proc_apagar_usuario.php?id=" . $row_usuario['id'] . "'>Apagar</a><br><hr>";
				}
			}
			?>
			</tbody>

		</table>


		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>