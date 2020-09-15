<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);


//$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
//$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
//$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
//$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
//$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
//$emissor = filter_input(INPUT_POST, 'emissor', FILTER_SANITIZE_STRING);
//$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
//$data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);



//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

//$edit_usuario = "UPDATE usuarios SET nome='$nome', email='$email', rg='$rg', cpf='$cpf', emissor='$emissor', telefone='$telefone', data_nascimento='$data_nascimento' WHERE id='$id'";
//$resultado_usuario = mysqli_query($conn, $edit_usuario);
$result_usuario = "UPDATE usuarios SET nome='$nome', email='$email', modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário editado com sucesso</p>";
	header("Location: Listar.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi editado com sucesso</p>";
	header("Location: edit_usuario.php?id=$id");
}
