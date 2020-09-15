<?php
 session_start(); 
include_once("conexao.php");
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM usuarios WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario); 
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="sistema.css">
        <link rel="stylesheet" type="text/css" href="print.css" media="print">
		<title> IMPRIMIR</title>		
    </head>
    
    <body>
   
        <table class="table table-hover table-dark">
            <thead>
                <tr class="">
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
                                <td><?php echo $row_usuario ['nome'] . "<br>";  ?></td>
                                <td><?php echo $row_usuario ['rg'] . "<br>"; ?></td>
                                <td><?php echo $row_usuario ['cpf'] . "<br>";  ?></td>
                                <td><?php echo $row_usuario ['emissor'] . "<br>"; ?></td>
                            </div>

							<td><?php echo $row_usuario ['data_nascimento'] ."<br>"; ?></td>
						</tr>
						
						<?php
						
					}
                };
                
            ?>

        </table>
        <div class="text-center">
            <button onclick="window.print();" class="btn btn-primary" id="print-btn">Imprimir</button>
        </div> 
      
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    </body>





</html>