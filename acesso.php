<!DOCTYPE <!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">    
    <title>Canteen Vibes</title>
    <link rel="icon" type="imagem/png" href="./favicon.ico" />
</head>
<style>
    body{
    margin: 0;
    padding: 0;
    height: 100%;
    overflow: hidden;
    background-color: rgb(226, 192, 140);
    font-family: 'Nunito';
}
    .box{
            
            background-color: rgb(102, 42, 13);
            color: white;
            border-radius: 30px 30px 30px 0px;
            width: 500px;
            height: 450px;
            align-items: center;
            margin-left: 600px;
            margin-top: -450px;
            font-family: 'Nunito';
        }
        
        legend{
            border: 1px solid dodgerblue;
            padding: 10px;
            text-align: center;
            background-color: red;
            border-radius: 8px;
        }
        .inputBox{
            position: relative;
        }
        .inputUser{
            
    width: 70%;
    height: 30px;
    background: none;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: 1px solid white;
    color: white;
    margin: 5px 80px;

    }
        #data_nascimento{
            border: none;
            padding: 8px;
            border-radius: 10px;
            outline: none;
            font-size: 15px;
        }
        #submit{
            background-color: rgb(102, 42, 13);
            width: 100%;
            border: none;
            padding: 15px;
            color: white;
            font-size: 15px;
            cursor: pointer;
            border-radius: 10px;
        }
        #back{
            text-decoration: none;
            margin-top: 50px;
            border: 2px solid #614933;
            border-radius: 15px;
            padding: 10px;
            color: #614933;
        }
        #back:hover{
            background: #614933;
            color: white;
        }
        hr{
            width: 2px;
            height: 550px;
            background-color: #614933;
            border: #614933;
            
        }
        #boizin{
            margin-top: -500px;
            margin-left: 80px;
        }
        .container{
    margin-left: 100px;
    margin-top: 150px;
    width: 500px;
    height: 450px;
    background-color: rgb(102, 42, 13);
    color: white;
    font-family: 'Nunito';
    border-radius: 30px 0 30px 30px;
    font-family: 'Nunito';
}
h1{
    padding: 30px 200px;
    font-family: 'Nunito';
}
.form-control{
    width: 70%;
    height: 30px;
    background: none;
    border-top: none;
    border-left: none;
    border-right: none;
    border-bottom: 1px solid white;
    color: white;
    margin: 20px 80px;
}
.btnLP{
    width: 35%;
    height: 30px;
    margin-left: 255px;
    margin-top: -46px;
    border-radius: 15px;
    border: none;
    font-family: 'Nunito';
    font-size: 20px;
}
.btnEN{
    width: 35%;
    height: 30px;
    margin-left: 75px;
    border-radius: 15px;
    margin-top: 50px;
    border: none;
    font-size: 20px;
    font-family: 'Nunito';
    
}
input::placeholder{
    color: white;
}
button{
    background-color: white;
    border: none;
    width: 350px;
    height: 30px;
    font-family: 'Nunito';
    font-size: 20px;
    margin-left: 75px;
    border-radius: 15px;
}
</style>
<body>
<div class="container">  
    <h1>Login</h1>
    <form name="flogin" method="post" action="login.php">
         <div class="form-group">
        <p><input type="text" name="email" placeholder="Email" class="form-control"></p>
        <p><input type="password" name="senha" placeholder="Senha" class="form-control"></p>
        <p><input class="btnEN" type="submit" name="enviar" value="Enviar" class="btn-success btn-lg"></p>
        <p><input class="btnLP" type="reset" name="enviar" value="Limpar"></p>
         </div>
        
    </form>
    <br>
    <?php
    

    if(isset($_POST['submit']))
    {
        // print_r('Nome: ' . $_POST['nome']);
        // print_r('<br>');
        // print_r('Email: ' . $_POST['email']);
        // print_r('<br>');
        // print_r('Telefone: ' . $_POST['telefone']);
        // print_r('<br>');
        // print_r('Sexo: ' . $_POST['genero']);
        // print_r('<br>');
        // print_r('Data de nascimento: ' . $_POST['data_nascimento']);
        // print_r('<br>');
        // print_r('Cidade: ' . $_POST['cidade']);
        // print_r('<br>');
        // print_r('Estado: ' . $_POST['estado']);
        // print_r('<br>');
        // print_r('Endereço: ' . $_POST['endereco']);

        include('conecta.php');

        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $telefone = $_POST['telefone'];
        

        $result = mysqli_query($conexao, "INSERT INTO clientes(nome,senha,email,telefone) 
        VALUES ('$nome','$senha','$email','$telefone')");

        header('Location: login.php');
    }

?>
    <div class="box">
        <form action="formulario.php" method="POST">      
                <h1>Cadastro</h1>
                <div class="inputBox">
                    <input type="text" name="nome" placeholder="Nome" id="nome" class="inputUser" required>
                 </div>
                <br>
                <div class="inputBox">
                    <input type="text" name="email" placeholder="Email" id="email" class="inputUser" required>
                </div>
                <br>
                <div class="inputBox">
                    <input type="tel" name="telefone" placeholder="Telefone" id="telefone" class="inputUser" required>
                 </div>
                <br>
                <div class="inputBox">
                    <input type="password" name="senha" placeholder="Senha" id="senha" class="inputUser" required>
                    </div>
                <p><input class="btnEN" type="submit" name="enviar" value="Enviar" class="btn-success btn-lg"></p>
                <p><input class="btnLP" type="reset" name="enviar" value="Limpar"></p>       
        </form>
    </div>
    </div>
</body>
</html>