<?php
/*
* iTech Empires:  Export Data from MySQL to CSV Script
* Version: 1.0.0
* Page: Export
*/

// Database Connection
require("conexao.php");

// get Users
$query = "SELECT nome, email, rg, cpf, emissor, data_nascimento FROM usuarios WHERE imprimir = 1  ORDER BY nome";
if (!$result = mysqli_query($conn, $query)) {
    exit(mysqli_error($conn));
}

$usuarios = array();
if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $usuarios[] = $row;
    }
}

header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename=clientes.csv');
$output = fopen('php://output', 'w');
fputcsv($output, array('NOME', 'EMAIL', 'RG', 'CPF', 'EMISSOR', 'DATA NASCIMENTO'));

if (count($usuarios) > 0) {
    foreach ($usuarios as $row) {
        fputcsv($output, $row);
    }
}
?>