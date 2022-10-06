<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <title>CARRINHO | Canteen Vibes</title>
    <link rel="icon" type="imagem/png" href="./favicon.ico" />
    <link rel="stylesheet" href="carrinho.css">
</head>
<body>
    

<div>
<?php
include("conexao.php");
session_start();
if(!isset($_SESSION['itens']))
{
    $_SESSION['itens']=array();
}
if(isset($_GET['add']) && $_GET['add']=="carrinho")
{
    $idProduto=$_GET['id'];
    if(!isset($_SESSION['itens'][$idProduto]))
    {
        $_SESSION['itens'][$idProduto]=1;

    }
    else{
        $_SESSION['itens'][$idProduto]+=1;
    }
}
//Exibe o carrinho
if(count($_SESSION['itens'])==0){
    echo 'carrinho vazio<br>';
    echo '<a href="index.php">Adicionar itens</a>';
}else{
    $_SESSION['dados']=array();
$totalgeral=0;
echo '<h2>Cliente: ' . $_SESSION['email'].'</h2><br>';
    foreach($_SESSION['itens'] as $idProduto=>$quantidade)
    {
    $select=$conexao->prepare("select * from produto where id=?");
    $select->bindParam(1,$idProduto);
    $select->execute();
    $produto=$select->fetchAll();
    $total=$quantidade * $produto[0]["valor"];
   echo 'Nome: '.$produto[0]["nome"].'<br>';
   echo 'Preço: '.$produto[0]["valor"].'<br>';
   echo 'Quantidade: '.$quantidade.'<br>';
   echo 'Total: '.$total.'<br>';
   echo '<a id="remover" href="remover.php?remover=carrinho&id='.$idProduto.'">Remover</a><br>';
   echo '<form> 
   <br><br><input class="btn" type="button" value="Adicionar mais itens" onClick="history.go(-1)" style="margin-left: 105px;"><br><br> 
   </form>';
   echo '____________________________________________________<br>';
   $totalgeral=$totalgeral+$total;
   $_SESSION['totalgeral'] =  $totalgeral;
   array_push(
       $_SESSION['dados'],
       array(
           'id_produto'=>$idProduto,
           'quantidade'=>$quantidade,
           'preco'=>$produto[0]['valor'],
           'total'=>$total,
       )
       );
}

?>
<div class="ttlP">

</div>
<?php
echo '<br><br><br><br><br><br><br><form method="post" action="finalizar.php">';
echo '<input class="btn" id="fnl" type="submit" value="Finalizar pedido" style="margin-left: 125px;">';
echo '</form>';
echo '<div style="position: absolute;    top: 82%;    left: 50%;    transform: translate(-50%, -50%); height: 10px;">';
echo "Total do pedido: " .$totalgeral."<br><br>";
echo '</div>';
}
?>
<?php

?>
</div>
</body>
</html>

