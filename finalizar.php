<?php

include("conexao.php");
session_start();
$entrega=$_POST['entrega'];
    $sqlpedido=$conexao->prepare("insert into pedido(idcliente,totalpedido,entrega) values(?,?,?)");
    $sqlpedido->bindParam(1,$_SESSION['idcliente']);
    $sqlpedido->bindParam(2,$_SESSION['totalgeral']);
    $sqlpedido->bindParam(3,$entrega);
    $sqlpedido->execute();

    try {
        $sql = "SHOW TABLE STATUS LIKE 'pedido'";  
        $stmt = $conexao->prepare($sql);
        $stmt->execute();
        $resultado = $stmt->fetch();
        $pedido = $resultado['Auto_increment']-1;
        } catch (Exception $ex) {
         echo $ex->getMessage();
        }
    


foreach($_SESSION['dados'] as $produtos){
 
    $insert=$conexao->prepare("insert into venda(idpedido,idproduto,quantidade,preco,total) values(?,?,?,?,?)");
    $insert->bindParam(1,$pedido);
    $insert->bindParam(2,$produtos['id_produto']);
    $insert->bindParam(3,$produtos['quantidade']);
    $insert->bindParam(4,$produtos['preco']);
    $insert->bindParam(5,$produtos['total']);
    $insert->execute();
    }
    

echo "Pedido finalizado com sucesso";
$_SESSION = array();
echo '<form action="index.php"> 
<input type="submit" value="Voltar para tela inicial"> 
</form>';


?>