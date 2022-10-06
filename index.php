<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME | CanteenVibes</title>
    <link rel="icon" type="imagem/png" href="./favicon.ico" />
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="main.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito&display=swap" rel="stylesheet">
    
</head>

<body>
<div id="bgheader">
<header>
        
        <div class="nav">
            <ul>
                <a id="nav" href="#" translate="no"><li>HOME</li></a>
                <a id="nav" href="fut.html"><li>FALE CONOSCO</li></a>
                <a id="nav" href="grl.html"><li>GALERIA DE FOTOS</li></a>
                <a id="nav" href="youtube.com/rato.tv"><li>MIDIAS SOCIAIS</li></a>
                <a id="nav" href="youtube.com/rato.tv"><li>PERFIL</li></a>
            </ul>
        </div>
    </header>
</div><br><br><br><br><br><br><br><br><br><br><br>


<?php

session_start();
if($_SESSION['log']!="ativo"){
   session_destroy();
   header("Location:acesso.php");
}
else{
    echo '<center>Oi, ' . $_SESSION['email']. ", bem-vindo nosso sistema!!<br><br><br><br>";
    
}
?>
<div class="container" >
<?php
include("conexao.php");

$select=$conexao->prepare("select * from produto");
$select->execute();
$fetch=$select->fetchAll();

foreach($fetch as $produto)
{
echo '<div class="table" style=" margin: 5px;  width: 30%;  height: 400px;  border: 3px solid #000;  border-radius: 15px; display: inline-table; font-family: Nunito;';
echo '<img src='.$produto['imagem'].' width="50px" heigth="50px"><br><br><br><br><br>';
echo '<h2 style="font-family: Nunito;"> ' . $produto['nome'] .'</h2><br>';
echo '' . $produto['descricao'] .'<br>';
echo '<h3> R$ ' . $produto['valor'] .'</h3><br>';


echo '<a href="carrinho.php?add=carrinho&id='.$produto['id'].'" style="background-color: rgb(0,0,100); color: white; text-decoration: none; padding: 10px; border-radius: 15px; font-weight: bold;">Adicionar ao carrinho +</a><br>';
echo '</div>';
}
?>
</div>


</body>
</html>