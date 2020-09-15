<?php
session_start();
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
		<title>Cadastrar</title>		
	</head>
	<body>
		<div class="container-fluid	 form-group col-lg-12 col-sm-8">
		
		
			<div class="dropdown btn-group-lg">
					<button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
					MENU </button>
					<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
						<a class="dropdown-item" href="pesquisar.php">Pesquisar</a>
						<a class="dropdown-item active" href="#">Cadastrar</a>
						<a class="dropdown-item" href="index.php">Lista</a>
						<a class="dropdown-item" href="imprimir.php">Imprimir</a>
						<a class="dropdown-item btn btn-danger" href="logout.php">Deslogar</a>
						<a  class=""></a>
					</div>
			</div>
			<h1 style="text-align:center">Cadastrar Cliente</h1>
			<?php
			if(isset($_SESSION['msg'])){
				echo $_SESSION['msg'];
				unset($_SESSION['msg']);
			}
			?>
			<div class="col-lg-8 form-group">
				<form class="form-group" method="POST" action="proc_cad_usuario.php">
					<label></label>
						<input  class="form-control col-lg-4" type="text" name="nome" placeholder="NOME"> <br><br>
					<label></label>
						<input  class="form-control col-lg-4" type="text" name="email" placeholder="EMAIL"> <br><br>
					<label></label>
						<input  class="form-control col-lg-4" type="date" name="data_nascimento" placeholder="DATA DE NASCIMENTO" onfocus="(this.type='MM/DD/YY')"> <br><br>
					<label></label>
						<input  class="form-control col-lg-4" type="text" name="telefone" placeholder="telefone"> <br><br>
					<label></label>
						<input  class="form-control col-lg-4" type="text" name="cpf" placeholder="CPF"> <br><br>
					<label></label>
						<input  class="form-control col-lg-4" type="text" name="rg" placeholder="RG"> <br><br>
						<label for="exampleFormControlSelect1">EMISSOR</label>
							<select class="form-control col-lg-4" id="exampleFormControlSelect1" name="emissor">
								<option value="" ></option>
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
								<option value="SSP/PB"> SSP/PB</option>
								<option value="CNH">CNH</option>
								<option value="MTPS">MTPS</option>

								<!-- <option>5</option> -->
							</select> <br>
					
				

					<input class="btn btn-primary" type="submit" value="Cadastrar">
				
				
				</form>
			</div>
		
		</div>
		<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
		<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
	</body>
</html>