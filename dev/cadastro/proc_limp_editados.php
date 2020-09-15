<?php
 session_start();
 include_once("conexao.php");  
 
 

$id= filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$imprimir= 0;
if(!empty($id)){
    $result_usuario = "UPDATE usuarios SET imprimir='$imprimir' WHERE id ='$id'";
    $resultado_usuario = mysqli_query ($conn, $result_usuario );
    
    if( mysqli_affected_rows($conn)){
        $_SESSION['msg'] = "<p style='color:green;'>Usuário removido com sucesso</p>";
        header("Location: imprimir.php");
    
    }else {
        $_SESSION['msg'] = "<p style='color:red;'>Usuário não foi removido</p>";
        header("Location: imprimir.php");
    
    }


}else {
    $_SESSION['msg'] = "<p style='color:red;'>Necessário selecionar um usuário</p>";
    header("Location: imprimir.php");

}
            
/* $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$imprimir = 0;



 $result_usuario = "UPDATE usuarios SET imprimir='$imprimir' WHERE id='$id'";
 $resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Usuário removido com sucesso</p>";
	header("#");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi removido</p>";
	header("Location: imprimir.php?id=$id");
}
 */
?>