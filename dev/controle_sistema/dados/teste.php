<?php
include_once("conexao.php");
$result_usuario = "SELECT data_nascimento FROM usuarios WHERE data_nascimento !=0000-00-00";
$result_idade = "select data_nascimento, 
YEAR(CURDATE()) - YEAR(data_nascimento)
    - (DATE_FORMAT(data_nascimento, '%y') < DATE_FORMAT(CURDATE(), '%y')) as idade
from usuarios  WHERE data_nascimento !=0000-00-00";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$resultado_idade = mysqli_query($conn, $result_idade); 

$row_usuario = mysqli_fetch_assoc($resultado_usuario); 
$row_idade = mysqli_fetch_assoc($resultado_idade); 


//while($row_usuario = mysqli_fetch_assoc($resultado_usuario)){
    //echo $row_usuario ['data_nascimento']."</br>";

//}

while($row_idade = mysqli_fetch_assoc($resultado_idade)){
    echo $row_idade ['idade']. "<br>";
}

?>