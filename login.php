
        <?php
       include('conecta.php');
       include('login-banco.php');  
 
       if($_POST){
           $email=$_POST["email"];
           $senha=$_POST["senha"];
		   $resultado=buscaCliente($conexao,$email,$senha);
           if($resultado){
               session_start();
               $_SESSION['email']=$email;
               $_SESSION['log']='ativo';
			   $_SESSION['idcliente']=$resultado['idcliente'];
             header("Location:index.php");
             die();
           }else{
           echo "Usuário ou senha inválida<br>";
           echo "<a href='acesso.php'>Voltar para a tela de login</a>"; 
           }
       }
        ?>

