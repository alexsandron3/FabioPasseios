<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset="utf-8">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    	<link rel="stylesheet" type="text/css" href="sistema.css">
		<title>Cadastrar</title>		
	</head>
	<body>
		<a href="cad_usuario.php">Cadastrar</a><br>
		<a href="index.php">Lista</a><br>
		<h1 style="text-align:center">Cadastrar Usuário</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<form method="POST" action="proc_cad_usuario.php">
            <label></label>
                <input type="text" name="nome" placeholder="NOME"> <br><br>
            <label></label>
                <input type="email" name="email" placeholder="EMAIL"> <br><br>
            <label></label>
                <input type="text" name="emissor" placeholder="emissor"> <br><br>
            <label></label>
                <input type="text" name="rg" placeholder="RG"> <br><br>
            <label></label>
                <input type="text" name="cpf" placeholder="CPF"> <br><br>
            <label></label>
                <input type="date" id="date" name="data_nascimento" placeholder="DATA DE NASCIMENTO"> <br><br>
            <label></label>
                <input type="text" name="telefone" placeholder="telefone"> <br><br>

            <input type="submit" value="Cadastrar">
        
        
        </form>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>