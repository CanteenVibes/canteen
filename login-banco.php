<?php
include('conecta.php');

function buscaCliente($conexao,$email,$senha){
$sql="select * from cliente where email='$email' and senha='$senha'";
$resultado= mysqli_query($conexao, $sql);
return mysqli_fetch_assoc($resultado);
}
?>

