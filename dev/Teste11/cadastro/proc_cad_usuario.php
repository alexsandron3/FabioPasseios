<?php
session_start();
include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$emissor = filter_input(INPUT_POST, 'emissor', FILTER_SANITIZE_STRING);
$rg = filter_input(INPUT_POST, 'rg', FILTER_SANITIZE_STRING);
$cpf = filter_input(INPUT_POST, 'cpf', FILTER_SANITIZE_STRING);
$data_nascimento = filter_input(INPUT_POST, 'data_nascimento', FILTER_SANITIZE_STRING);
$telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO usuarios (nome, email, emissor, rg, cpf, data_nascimento, telefone, created) VALUES ('$nome', '$email', '$emissor', '$rg', '$cpf', '$data_nascimento', '$telefone', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário cadastrado com sucesso</p>";
	header("Location: index.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso</p>";
	header("Location: cad_usuario.php");
}
