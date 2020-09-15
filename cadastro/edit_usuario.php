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
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    	<link rel="stylesheet" type="text/css" href="sistema.css">
		<title> Editar</title>		
	</head>
	<body>
		<div class="dropdown">
				<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				MENU </button>
				<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
					<a class="dropdown-item" href="pesquisar.php">Pesquisar</a>
					<a class="dropdown-item" href="cad_usuario.php">Cadastrar</a>
					<a class="dropdown-item" href="index.php">Lista</a>
					<a class="dropdown-item" href="imprimir.php">Lista de Passeio</a>
					<a class="dropdown-item btn btn-danger" href="../controle_sistema/logout.php">Deslogar</a>
				</div>
		</div>
		<h1 style="text-align:center">Editar Cliente</h1>
		<?php
		if(isset($_SESSION['msg'])){
			echo $_SESSION['msg'];
			unset($_SESSION['msg']);
		}
		?>
		<div class="col-sm-4 my-1">
			<form  class="form-group" method="POST" action="proc_edit_usuario.php" >
				<input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>">

				<label></label>
					<input type="text"  class="form-control" name="nome" placeholder="NOME" value="<?php echo $row_usuario['nome']; ?>"> <br><br>

				<label></label>
					<input type="email" class="form-control" name="email" placeholder="EMAIL" value="<?php echo $row_usuario['email']; ?>"> <br><br>

				
				<label> </label>
					<input type="date"  class="form-control" name="data_nascimento" placeholder="DATA DE NASCIMENTO" value="<?php echo $row_usuario['data_nascimento']; ?>"> <br><br>

				<label></label>
					<input type="text"  class="form-control" name="telefone" placeholder="telefone" value="<?php echo $row_usuario['telefone']; ?>"> <br><br>

				<label></label>
					<input type="text"  class="form-control" name="cpf" placeholder="CPF" value="<?php echo $row_usuario['cpf']; ?>"> <br><br>		
				<label></label>
					<input type="text"  class="form-control" name="rg" placeholder="RG"     value="<?php echo $row_usuario['rg']; ?>"> <br><br>


					<label for="exampleFormControlSelect1">EMISSOR ATUAL</label>
							<select class="form-control col-lg-4" id="exampleFormControlSelect1" name="emissor">
								<option value="" ><?php echo $row_usuario['emissor']; ?></option>


								<!-- <option>5</option> -->
							</select> <br>

					<label for="exampleFormControlSelect1">EDITAR EMISSOR</label>
					<select class="form-control col-lg-4" id="exampleFormControlSelect1" name="emissor">
							<option value="<?php echo $row_usuario['emissor']; ?>" ><?php echo $row_usuario['emissor']; ?></option>>
							<option value="DETRAN" >DETRAN</option>
							<option value="IFP"> IFP</option>
							<option value="OAB">OAB</option>
							<option value="SSP">SSP</option>
							<option value="DIC">DIC</option>
							<option value="MDMB">MDMB</option>
							<option value="IIRG">IIRG</option>
							<option value="SSPIIPM">SSPIIPM</option>
							<option value="RGD">RGD</option>
							<option value="SSPCE">SSPCE</option>
							<option value="MB">MB</option>
							<option value="SE/DPMAF/DPF">SE/DPMAF/DPF</option>
							<option value="IFRJ">IFRJ</option>
							<option value="CRC">CRC</option>
							<option value="CGPI">CGPI</option>
							<option value="CNH">CNH</option>
							<option value="MTPS">MTPS</option>
					</select>


						<!-- <option>5</option> -->
					</select> <br>
				LISTAR PARA IMPRESSÃO:
				<input name="imprimir" class="" type="radio" value="1"> SIM
				<input name="imprimir" class="" type="radio" value="0" checked> NÃO </BR>
				<input class="btn btn-primary" type="submit" value="Editar">
			</form>


	<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>